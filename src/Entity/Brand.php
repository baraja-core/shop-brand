<?php

declare(strict_types=1);

namespace Baraja\Shop\Brand\Entity;


use Baraja\Country\Entity\Country;
use Baraja\EcommerceStandard\DTO\BrandInterface;
use Baraja\EcommerceStandard\DTO\CountryInterface;
use Baraja\Localization\TranslateObject;
use Baraja\Localization\Translation;
use Doctrine\ORM\Mapping as ORM;
use Nette\Utils\Strings;

/**
 * @method Translation|null getDescription(?string $locale = null)
 * @method void setDescription(?string $content = null, ?string $locale = null)
 */
#[ORM\Entity]
#[ORM\Table(name: 'shop__brand')]
class Brand implements BrandInterface
{
	use TranslateObject;

	#[ORM\Id]
	#[ORM\Column(type: 'integer', unique: true)]
	#[ORM\GeneratedValue]
	protected int $id;

	#[ORM\Column(type: 'translate', nullable: true)]
	protected ?Translation $description = null;

	#[ORM\Column(type: 'string')]
	private string $name;

	#[ORM\Column(type: 'string', length: 64, unique: true)]
	private string $code;

	#[ORM\Column(type: 'string', length: 80, unique: true)]
	private string $slug;

	#[ORM\Column(type: 'string', length: 128, nullable: true)]
	private ?string $iconPath = null;

	#[ORM\Column(type: 'integer', options: ['unsigned' => true])]
	private int $position = 0;

	#[ORM\Column(type: 'boolean')]
	private bool $active = false;

	#[ORM\Column(type: 'boolean')]
	private bool $showInFeed = true;

	#[ORM\Column(type: 'boolean')]
	private bool $b2b = false;

	#[ORM\Column(type: 'boolean')]
	private bool $deleted = false;

	#[ORM\ManyToOne(targetEntity: Country::class)]
	private ?CountryInterface $country = null;


	public function __construct(string $name, string $code, string $slug)
	{
		$this->setName($name);
		$this->setCode($code);
		$this->setSlug($slug);
	}


	public function getId(): int
	{
		return $this->id;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function setName(string $name): void
	{
		$this->name = $name;
	}


	public function getRealDescription(): string
	{
		return (string) $this->getDescription();
	}


	public function getCode(): string
	{
		return $this->code;
	}


	public function setCode(string $code): void
	{
		$this->code = Strings::webalize($code);
	}


	public function getSlug(): string
	{
		return $this->slug;
	}


	public function setSlug(string $slug): void
	{
		$this->slug = Strings::webalize($slug);
	}


	public function getIconPath(): ?string
	{
		return $this->iconPath;
	}


	public function setIconPath(?string $iconPath): void
	{
		$this->iconPath = $iconPath;
	}


	public function getPosition(): int
	{
		return $this->position;
	}


	public function setPosition(int $position): void
	{
		$this->position = $position;
	}


	public function isActive(): bool
	{
		return $this->active;
	}


	public function setActive(bool $active): void
	{
		$this->active = $active;
	}


	public function isShowInFeed(): bool
	{
		return $this->showInFeed;
	}


	public function setShowInFeed(bool $showInFeed): void
	{
		$this->showInFeed = $showInFeed;
	}


	public function isB2b(): bool
	{
		return $this->b2b;
	}


	public function setB2b(bool $b2b): void
	{
		$this->b2b = $b2b;
	}


	public function isDeleted(): bool
	{
		return $this->deleted;
	}


	public function setDeleted(bool $deleted): void
	{
		$this->deleted = $deleted;
	}


	public function getCountry(): ?CountryInterface
	{
		return $this->country;
	}


	public function setCountry(?CountryInterface $country): void
	{
		$this->country = $country;
	}
}
