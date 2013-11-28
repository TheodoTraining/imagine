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
use Symfony\Component\Templating\EngineInterface;

class DemoController
{
    /**
     * @var \Imagine\Imagick\Imagine
     */
    protected $imagine;

    /**
     * @var string
     */
    protected $originalPath;

    /**
     * @var string
     */
    protected $destinationPath;

    /**
     * @var Transformation
     */
    protected $transformation;

    /**
     * @var EngineInterface
     */
    protected $templating;

    public function __construct($originalPath, $destinationPath, Transformation $transformation, EngineInterface $templating)
    {
        $this->originalPath = $originalPath;
        $this->destinationPath = $destinationPath;
        $this->transformation = $transformation;
        $this->templating = $templating;

        $this->imagine = new Imagine();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function useFilterAction(Request $request)
    {
        $this->imagine->open($this->originalPath)
            ->strip()
            ->crop(new Point(15, 15), new Box(600, 450))
            ->thumbnail(new Box(400, 300), ImageInterface::THUMBNAIL_OUTBOUND)
            ->save($this->destinationPath);

        return $this->templating->renderResponse(
            'TheodoImagineFormationBundle:Demo:useFilter.html.twig'
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function useTransformationAction(Request $request)
    {
        //Open original picture using Imagine
        $originalPicture = $this->imagine->open($this->originalPath);

        //Apply transformation to the picture
        $this->transformation->apply($originalPicture);

        //Display the resulting new picture
        return $this->templating->renderResponse(
            'TheodoImagineFormationBundle:Demo:useTransformation.html.twig'
        );
    }

    public function displayOriginalPictureAction(Request $request)
    {
        return $this->getPicture($this->originalPath, 'Original Picture');
    }

    public function displayDestinationPictureAction(Request $request)
    {
        return $this->getPicture($this->destinationPath, 'Destination Picture');
    }

    protected function getPicture($path, $name)
    {
        $file = new File($path);

        $binaryFileResponse = new BinaryFileResponse($file);
        $binaryFileResponse->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $name);

        return $binaryFileResponse;
    }
}
