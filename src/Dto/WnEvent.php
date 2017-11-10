<?php

namespace MSHACK\DataScraper\Dto;

use Geocoder\Model\Coordinates;
use MSHACK\DataScraper\GeoData\Address;
use MSHACK\DataScraper\GeoData\Entry;
use MSHACK\DataScraper\GeoData\Geo;

class WnEvent {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $district;

	/**
	 * @var \DateTime
	 */
	protected $date;

	/**
	 * @var string
	 */
	protected $address;

	/**
	 * @var string
	 */
	protected $category;

	/**
	 * @var []
	 */
	protected $coordinates;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getDistrict() {
		return $this->district;
	}

	/**
	 * @param string $district
	 */
	public function setDistrict($district) {
		$this->district = $district;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}


	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @return string
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param string $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * @return Coordinates
	 */
	public function getCoordinates() {
		return $this->coordinates;
	}

	/**
	 * @param mixed $coordinates
	 */
	public function setCoordinates($coordinates) {
		$this->coordinates = $coordinates;
	}

	/**
	 * Converts the current object to a valid geo object and returns it
	 *
	 * @return Entry
	 */
	public function transformToGeoData(){
		$entry = new Entry();
		$entry->setName($this->getName());
		$entry->setUrl("");

		$geo = new Geo();
		$geo->setLat($this->getCoordinates()->getLatitude());
		$geo->setLon($this->getCoordinates()->getLongitude());

		$address = new Address();
		$address->setGeo($geo);
		$entry->setAddress($address);

		return $entry;
	}
}