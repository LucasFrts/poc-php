<?php

enum Status : string
{
    case PAID = 'pago';
    case PENDING = 'pendente';
    case CANCELED = 'cancelado';
}
enum GatewayStatus : int 
{
    case PAID = 1;
    case PENDING = 2;
    case CANCELED = 3;

    public function color() : string
    {
        return match($this){
            self::PAID => 'green',
            self::PENDING => 'yellow',
            self::CANCELED => 'red'
        };
    }
}

class CheckoutService
{
    public function handle(Status $gateway_status)
    {
        return $gateway_status->value;
    }
}
class CheckoutGatewayService 
{
    public function handle(GatewayStatus $gateway_status)
    {
        return $gateway_status->value . " " . $gateway_status->color();
    } 
}

$service = new CheckoutService;
echo $service->handle(Status::PAID);

$gateway_service = new CheckoutGatewayService;
echo $gateway_service->handle(GatewayStatus::PAID);