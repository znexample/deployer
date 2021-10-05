<?php

namespace Deployer;

function makeDirectory(string $directory) {
    run("mkdir -p $directory");
}

function isFileExists(string $file): bool {
    return test("[ -f $file ]");
}

function uploadKey(string $source) {
    $dest = "~/.ssh/$source";
    if (!isFileExists($dest)) {
        upload("{{ssh_directory}}/$source", $dest);
    }
    if (!isFileExists($dest)) {
        upload("{{ssh_directory}}/$source.pub", "$dest.pub");
    }
    run("ssh-add ~/.ssh/$source");
}
