<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

declare(strict_types=1);

namespace LazyProperty\Exception;

use InvalidArgumentException;

/**
 * Exception for missing property getters
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class MissingLazyPropertyGetterException extends InvalidArgumentException implements ExceptionInterface
{
    /**
     * Named constructor.
     *
     * @param object $instance
     * @param string $getter
     * @param string $property
     *
     * @return self
     */
    public static function fromGetter(object $instance, string $getter, string $property): self
    {
        return new self(sprintf(
            'The getter "%s" for lazy property "%s" is not defined in "%s#%s"',
            $getter,
            $property,
            get_class($instance),
            spl_object_hash($instance)
        ));
    }
}
