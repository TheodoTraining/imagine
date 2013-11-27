<?php

namespace Theodo\ImagineFormationBundle\Builder;

use Imagine\Filter\Transformation;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;

/**
 * Class TransformationBuilder
 *
 * @author Charles Pourcel <ch.pourcel@gmail.com>
 */
class TransformationBuilder
{
    public static function build($destinationPath)
    {
        $transformation = new Transformation();
        $transformation
            ->strip()
            ->crop(new Point(15, 15), new Box(600, 450))
            ->thumbnail(new Box(400, 300), ImageInterface::THUMBNAIL_OUTBOUND)
            ->save($destinationPath);

        return $transformation;
    }
}
