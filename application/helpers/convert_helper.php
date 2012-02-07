<?php
function convert_odt_to_pdf($python_bin, $odt_file, $pdf_file)
{
    $command = sprintf('"%s" DocumentConverter.py "%s" "%s"',
        $python_bin, $odt_file, $pdf_file);
    exec($command);
}