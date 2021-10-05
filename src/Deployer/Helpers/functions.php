<?php

namespace Deployer;

function runZn(string $command)
{
    cd('{{release_path}}/vendor/bin');
    return run('{{bin/php}} zn ' . $command);
}

function makeDirectory(string $directory)
{
    run("mkdir -p $directory");
}

function isFileExists(string $file): bool
{
    return test("[ -f $file ]");
}

function uploadKey(string $source)
{
    $dest = "~/.ssh/$source";
    $isUploadedPrivateKey = uploadIfNotExist("{{ssh_directory}}/$source", $dest);
    $isUploadedPublicKey = uploadIfNotExist("{{ssh_directory}}/$source.pub", "$dest.pub");
    if($isUploadedPrivateKey || $isUploadedPublicKey) {
        run("ssh-add ~/.ssh/$source");
    }
}

function uploadIfNotExist(string $source, string $dest): bool
{
    if (!isFileExists($dest)) {
        upload($source, $dest);
        return true;
        //writeln("File \"$dest\" already exist");
    } else {
        return false;
        //writeln("File \"$dest\" already exist");
    }
}
