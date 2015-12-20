@include("./vendor/autoload.php")

@servers (['vm' => 'vagrant@192.168.33.10'])

@setup
    $start = date('Y/m/d H:i:s');
@endsetup

@task ('ls', ['on' => 'vm1'])
    ls -la /tmp
@endtask

@task ('touch', ['on' => 'vm'])
    touch /tmp/hoge
@endtask

@task ('fail', ['on' => 'vm'])
    test -f /tmp/fuga
    echo "failed"
@endtask

@macro ('all')
    touch
    ls
@endmacro

@macro ('all-fail')
    touch
    fail
    ls
@endmacro

@after
    echo "after" . PHP_EOL;
    echo "started: " . $start . PHP_EOL;
    echo "endted: " . date('Y/m/d H:i:s');
@endafter
