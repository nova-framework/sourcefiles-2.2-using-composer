<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use mPDF;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

/*
*
* Demo controller
*/
class Demo extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Define Index method
     */
    public function index()
    {
        $pdf = new mPDF();
        $pdf->WriteHTML('<h1>Hello</h1><p>Nice PDF!</p>');
        $pdf->Output();
    }

    public function file()
    {
        $adapter = new Local('app');
        $filesystem = new Filesystem($adapter);
        $contents = $filesystem->listContents();
        echo '<pre>';
        print_r($contents);
        echo '</pre>';
    }
}
