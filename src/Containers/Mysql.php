<?php


namespace Sinnbeck\LaravelServed\Containers;

class Mysql extends Container
{
    protected $port = '3306';

    public function run()
    {
        $env = [
            'network' => $this->projectName(),
            'container_name' => $this->makeContainerName(),
            'image_name' => $this->makeImageName(),
            'port' => $this->port,
        ];

        parent::run();
        $this->shell->run('docker run -d --restart always --network="$network" --name "$container_name" --network-alias=mysql -p "$port":3306 -v mysql:/var/lib/mysql/ "$image_name"', $env);
    }


}