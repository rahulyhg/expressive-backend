<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-23
 * Time: 13:57
 */

declare(strict_types=1);

namespace App\Exception;

use DomainException;
use Zend\ProblemDetails\Exception\CommonProblemDetailsExceptionTrait;
use Zend\ProblemDetails\Exception\ProblemDetailsExceptionInterface;

class InvalidParameterException extends DomainException implements ProblemDetailsExceptionInterface
{
    use CommonProblemDetailsExceptionTrait;

    public static function create(
        string $message,
        array $additionalData = []
    ): self {
        $e = new self($message);
        $e->status = 400;
        $e->detail = $message;
        $e->type = '/api/doc/invalid-parameter';
        $e->title = 'Invalid parameter';
        $e->additional['parameters'] = $additionalData;

        return $e;
    }
}
