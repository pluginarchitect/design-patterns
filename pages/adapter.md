# Adapter Pattern in WordPress

[<-- Back to all design patterns](index.html)

## Intent
> "Convert the interface of a class into another interface clients expect. Adapter lets classes work together that couldn't otherwise because of incompatible interfaces." - Design Patterns (book)

## Real Example from a WordPress plugin
GiveWP, a [donation plugin for WordPress](https://givewp.com/), uses an adapter to convert Gutenberg block data to the GiveWP Fields API. The Gutenberg project is used for a visual form builder user interface and requires an opinionated data structure for manipulating blocks. Those blocks are not directly used to render donation forms, but are first converted to a format used by GiveWP to represent form fields. These two formats represent the same underlying data with different requirements and use cases.

### Comparing Formats

Blocks are a highly composable and reusable format used by Gutenberg and the WordPress block editor. The generic structure consists of a `name`, a list of `attributes`, and a a list of nested blocks called `innerBlocks`. These flexible properties easily map to a user interface consisting of input controls in a visual editor.

Below is an example of a donor's email address represented as a block in Gutenberg:

```json
[{
	name: 'field/donor-email',
	attributes: [
		label: 'Donor Email',
		placeholder: 'donor@example.test',
		required: true
	]
]}
```

Fields are a specific format which represent the structure of a form in GiveWP. Each field type consists of properties specific to that type including validation rules for evaluating input. These explicit properties map easily to those of the rendered form fields.

Below is an example of a donor's email address represented as a fields in the Fields API:

```json
[{
	type: 'email-field',
	label: 'Donor Name',
	placeholder: 'donor@example.test',
	validation: [
		required: true
	]
}]
```

## Adapting Formats

In the previous example of the donor email the block attributes map to properties of the field.

| Block | Field |
| --- | --- |
| block.attributes.label | field.label |
| block.attributes.placeholder | field.placeholder |
| block.attributes.required | field.validation.required |

The logic of the attribute to property mapping is fairly straightforward forward, but it still needs to be represented in code in a way that is predictable, maintainable, and testable. For this we would use an adapter.

```php
class BlockToFieldAdapter {
	function fromBlock( Block $block ) { ... }
	function toField(): Field { ... }
}
```
