<?php

declare(strict_types=1);

namespace Baraja\Shop\Brand;


use Baraja\Doctrine\ORM\DI\OrmAnnotationsExtension;
use Baraja\Plugin\PluginComponentExtension;
use Nette\DI\CompilerExtension;

final class BrandExtension extends CompilerExtension
{
	/**
	 * @return array<int, string>
	 */
	public static function mustBeDefinedBefore(): array
	{
		return [OrmAnnotationsExtension::class];
	}


	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();
		PluginComponentExtension::defineBasicServices($builder);
		OrmAnnotationsExtension::addAnnotationPathToManager($builder, 'Baraja\Shop\Brand\Entity', __DIR__ . '/Entity');
	}
}
