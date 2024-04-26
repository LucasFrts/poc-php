<?php

class FirstService {
    public function execute()
    {
        return "first service running";
    }
}

class SecondService {

    
    public function __construct(
        private FirstService $service
    ) {}
    public function handle()
    {
        return $this->service->execute();
    }

}

$secondService = new SecondService(new FirstService);

echo $secondService->handle();