<?php

function createImage($ftype)
{
    if ($ftype == 'docx') {
        echo "<svg class='icon-icon-doc'><use xlink:href='#icon-doc'></use></svg>";
    } else if ($ftype == 'xlsx') {
        echo "<svg class='icon-icon-xls'><use xlink:href='#icon-xls'></use></svg>";
    } else if ($ftype == 'pdf') {
        echo "<svg class='icon-icon-pdf'><use xlink:href='#icon-pdf'></use></svg>";
    } else if ($ftype == 'png' || $ftype == 'jpg') {
        echo "<svg class='icon-icon-image'><use xlink:href='#icon-image'></use></svg>";
    } else if ($ftype == 'html') {
        echo "<svg class='icon-icon-html'><use xlink:href='#icon-html'></use></svg>";
    } else if ($ftype == 'css') {
        echo "<svg class='icon-icon-css'><use xlink:href='#icon-css'></use></svg>";
    } else if ($ftype == 'js') {
        echo "<svg class='icon-icon-js'><use xlink:href='#icon-js'></use></svg>";
    } else if ($ftype == 'exe') {
        echo "<svg class='icon-icon-exe'><use xlink:href='#icon-exe'></use></svg>";
    } else{
        echo "<svg class='icon-icon-unknown'><use xlink:href='#icon-unknown'></use></svg>";
    }
}
