<?php

namespace Theodo\ImagineFormationBundle\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Imagine\Filter\Transformation;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Imagine\Imagick\Imagine;

class DemoController
{
    /**
     * @var \Imagine\Imagick\Imagine
     */
    protected $imagine;

    /**
     * @var Transformation
     */
    protected $transformation;

    /**
     * @var string
     */
    protected $originalPath;

    /**
     * @var string
     */
    protected $destinationPath;

    public function __construct($originalPath, $destinationPath)
    {
        $this->originalPath = $originalPath;
        $this->destinationPath = $destinationPath;

        $this->imagine = new Imagine();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function useFilterAction(Request $request)
    {
        return new Response('Use Filters');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function useTransformationAction(Request $request)
    {
        $this->transformation = new Transformation($this->imagine);
        $this->transformation
            ->strip()
            ->crop(new Point(15, 15), new Box(600, 450))
            ->thumbnail(new Box(400, 300), ImageInterface::THUMBNAIL_OUTBOUND)
            ->save($this->destinationPath);

        //Destination picture not yet generated
        $originalPicture = $this->imagine->open($this->originalPath);

        $this->transformation->apply($originalPicture);

        $file = new File($this->destinationPath);

        $binaryFileResponse = new BinaryFileResponse($file);
        $binaryFileResponse->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE, 'Transformations Applied');

        return $binaryFileResponse;
    }
}
