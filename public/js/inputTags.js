const tagSelector = document.querySelector('#tags');
const tagList = document.querySelector('#tagList');
const tagContainers = document.querySelectorAll('.tags');
const deleteTags = document.querySelectorAll('.is-delete');
const tagsField = document.querySelector('#tagsField');

tagSelector.addEventListener('change', function() {
	const selectedOptions = tagSelector.selectedOptions;
	// Get tag names from hidden input
	let tagInput = tagList.value !== '' ? tagList.value.split(',') : [];

	addOptions(selectedOptions, tagInput);
	sortOptions(tagInput);
	removeOldTags();
	addNewTags(tagInput);
});
// Add values to hidden input
function addOptions(selectedOptions, tagInput) {
	for (let option of selectedOptions) {
		if (!tagInput.includes(option.value)) {
			tagInput.push(option.value);
		}
	}
}
// Sort the tags alphabetically
function sortOptions(tagInput) {
	tagInput = tagInput.sort((a, b) => {
		a = a.toLowerCase();
		b = b.toLowerCase();
		return a.localeCompare(b);
	});
	tagList.value = tagInput.join(',');
}

function removeOldTags() {
	for (let i = tagsField.children.length - 1; i > -1; i--) {
		tagsField.children[i].remove();
	}
}

function addNewTags(tagInput) {
	for (let i = 0; i < tagInput.length; i++) {
		const control = document.createElement('div');
		control.setAttribute('class', 'control');
		const tagContainer = document.createElement('div');
		tagContainer.setAttribute('class', 'tags has-addons');
		const tag = document.createElement('a');
		tag.textContent = tagInput[i];
		tag.setAttribute('class', 'tag is-primary is-capitalized');
		const deleteTag = document.createElement('a');
		deleteTag.setAttribute('class', 'tag is-delete');
		setRemoveTagListener(deleteTag);
		tagContainer.appendChild(tag);
		tagContainer.appendChild(deleteTag);
		control.appendChild(tagContainer);
		tagsField.appendChild(control);
	}
}
// If a tag is deleted, deselect it from the list
// and remove the tag name from the hidden input list.
function setRemoveTagListener(element) {
	element.addEventListener('click', function() {
		const text = element.previousElementSibling.textContent;
		const options = tagSelector.selectedOptions;
		for (let option of options) {
			if (option.value === text) {
				option.selected = false;
			}
		}

		tagList.value = tagList.value.replace(text, '').replace(',,', ',');
		if (tagList.value.startsWith(',')) {
			tagList.value = tagList.value.slice(1);
		}
		if (tagList.value.endsWith(',')) {
			tagList.value = tagList.value.slice(0, tagList.value.length - 1);
		}

		element.parentElement.parentElement.remove();
	});
}

deleteTags.forEach((deleteTag) => setRemoveTagListener(deleteTag));
