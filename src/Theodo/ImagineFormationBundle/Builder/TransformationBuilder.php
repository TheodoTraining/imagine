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
            ->crop(new Point(780, 40), new Box(630, 840))
            ->thumbnail(new Box(315, 420), ImageInterface::THUMBNAIL_OUTBOUND)
            ->save($destinationPath);

        return $transformation;
    }
}
