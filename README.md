# Markdown

Markdown is a very small plugin for the Blocks CMS that adds a `markdown` filter into the templating engine.

## Installation

Clone / download the code and place the `markdown` folder inside `blocks/plugins`. Install through the Blocks CP.

## Usage

Create a _plain text block_ to store the content. **Ensure it supports line breaks**. Then, in your template, pipe the block into the `markdown` filter:

	{% for entry in blx.entries.find({ section: 'Blog' }) %}
		{{ entry.content | markdown }}
	{% endfor %}