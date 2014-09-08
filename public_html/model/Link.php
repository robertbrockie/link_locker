<?php

	class Link {

		private $id = 0;
		private $url = '';
		private $image_url = '';
		private $title = '';

		public function getId() {
			return $this->id;
		}

		public function setId($value) {
			$this->id = $value;
		}

		public function getUrl() {
			return $this->url;
		}

		public function setUrl($value) {
			$this->url = $value;
		}

		public function getImageUrl() {
			return $this->image_url;
		}

		public function setImageUrl($value) {
			$this->image_url = $value;
		}

		public function getTitle() {
			return $this->title;
		}

		public function setTitle($value) {
			$this->title = $value;
		}
	}