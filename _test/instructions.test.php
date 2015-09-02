<?php

/**
 * @group plugin_pageredirect
 */
class plugin_pageredirect_test1 extends DokuWikiTest {

	public function setUp() {
		$this->pluginsEnabled[] = 'pageredirect';
		parent::setUp();
	}

	public function test_instructions() {
		$instructions = p_get_instructions("~~REDIRECT>namespace:page~~");

		$expected = array(
			0 =>
			array(
				0 => 'document_start',
				1 =>
				array(),
				2 => 0,
			),
			1 =>
			array(
				0 => 'plugin',
				1 =>
				array(
					0 => 'pageredirect',
					1 =>
					array(
						0 => 'namespace:page',
						1 => '<div class="noteredirect">This page has been moved, the new location is <a href="'.DOKU_BASE.'doku.php?id=namespace:page" class="wikilink2" title="namespace:page" rel="nofollow">page</a>.</div>',
					),
					2 => 5,
					3 => '~~REDIRECT>namespace:page~~',
				),
				2 => 1,
			),
			2 =>
			array(
				0 => 'document_end',
				1 =>
				array(),
				2 => 1,
			),
		);
		$this->assertEquals($expected, $instructions);
	}
}
