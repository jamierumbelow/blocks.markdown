<?php
/**
 * A small Twig template filter for parsing text as Markdown within
 * the Blocks CMS
 *
 * @link https://github.com/jamierumbelow/blocks.markdown
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

namespace Blocks;

class MarkdownTwigExtension extends \Twig_Extension
{
	/* --------------------------------------------------------------
	 * EXTENSION INFO
	 * ------------------------------------------------------------ */

	/**
	 * The Twig extension's name. We'll never use it, but it's
	 * an abstract method so we have to implement it.
	 */
	public function getName()
	{
		return Blocks::t('Markdown');
	}

	/* --------------------------------------------------------------
	 * FILTERS
	 * ------------------------------------------------------------ */

	/**
	 * Return a list of filters that this extension adds
	 * to Twig, as an array of Twig_Filter instances
	 */
	public function getFilters()
	{
		return array(
			'markdown' => new \Twig_Filter_Method($this, 'markdownFilter')
		);
	}

	/**
	 * Our filter code itself - grab the character set, load
	 * the Markdown parser, parse and return template-safe HTML
	 */
	public function markdownFilter($str)
	{
		$charset = blx()->templates->getTwig()->getCharset();
		$markdown = new \CMarkdownParser();

		return new \Twig_Markup($markdown->safeTransform($str), $charset);
	}
}