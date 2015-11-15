@include("./vendor/autoload.php")

@servers (['vm' => 'vagrant@192.168.33.10'])

@task ('ls', ['on' => 'vm'])
    ls -la
@endtask
