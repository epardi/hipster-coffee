document.addEventListener('DOMContentLoaded', () => {
	const postModalClasses = document.querySelector('.post-modal').classList;
	const commentsModalMessage = document.querySelector('.comments-modal .message-body');
	const commentsModalClasses = document.querySelector('.comments-modal').classList;
	const commentRadioButtons = Array.from(document.querySelectorAll('input[name="comments"]'));
	const deletePostComments = document.querySelector('#deletePostComments');
	const accordionHeader = document.querySelector('.delete-comments-accordion .accordion-header.toggle');
	// Show delete post modal when user clicks delete button.
	// Hide the modal is user clicks cancel, close icon, or modal background.
	(document.querySelectorAll('.button.is-mocha.delete-post') || []).forEach(($delete) => {
		$delete.addEventListener('click', () => {
			postModalClasses.toggle('is-active');
		});
	});
	(document.querySelectorAll('.post-modal .modal-close') || []).forEach(($close) => {
		$close.addEventListener('click', () => {
			postModalClasses.toggle('is-active');
		});
	});
	(document.querySelectorAll('.post-modal .modal-background') || []).forEach(($background) => {
		$background.addEventListener('click', () => {
			postModalClasses.toggle('is-active');
		});
	});
	(document.querySelectorAll('.post-modal .cancel') || []).forEach(($cancel) => {
		$cancel.addEventListener('click', () => {
			postModalClasses.toggle('is-active');
		});
	});
	// Enable delete user option if radio button checked. Disable otherwise.
	(document.querySelectorAll('input[name="comments"]') || []).forEach(($button) => {
		$button.addEventListener('click', () => {
			if (deletePostComments.hasAttribute('disabled')) {
				deletePostComments.removeAttribute('disabled');
			}
			const users = document.querySelector('#users-select');
			if ($button.id === 'users') {
				users.removeAttribute('disabled');
			} else {
				users.setAttribute('disabled', '');
			}
		});
	});
	function handleDeleteComments() {
		deletePostComments.addEventListener('click', (e) => {
			e.preventDefault();
			// Swap out the modal text based on the selection.
			const checkedButton = commentRadioButtons.find((button) => button.checked);
			if (checkedButton) {
				const checkedButtonId = checkedButton.id;
				const commentModalText = document.createElement('span');
				commentModalText.id = 'comment-modal-text';
				if (commentsModalMessage.firstChild.id === commentModalText.id) {
					commentsModalMessage.removeChild(commentsModalMessage.firstChild);
				}
				switch (checkedButtonId) {
					case 'users':
						commentModalText.textContent = "Delete selected user and the user's comments?";
						break;
					case 'checked-comments':
						commentModalText.textContent = 'Delete all checked comments?';
						break;
					case 'all-comments':
						commentModalText.textContent = 'Delete all comments for this post?';
						break;
					default:
						break;
				}
				commentsModalMessage.insertAdjacentElement('afterbegin', commentModalText);
			}
			// Show delete comments modal.
			commentsModalClasses.toggle('is-active');
		});
	}
	if (deletePostComments) {
		// One form controls deleting a user and the user's comments.
		// Another form controls deleting checked comments and all comments.
		// The former has one radio button, and the latter has two.
		// So to make sure only one button is checked at a time, the
		// click event unchecks the other buttons.
		commentRadioButtons.forEach(($button) => {
			$button.addEventListener('click', () => {
				const otherBtns = commentRadioButtons.filter((btn) => btn !== $button);
				otherBtns.forEach(($btn) => {
					$btn.checked = false;
				});
			});
		});
		handleDeleteComments();
	}
	// Close comments modal if user clicks close icon, cancel, or modal background.
	(document.querySelectorAll('.comments-modal .modal-close') || []).forEach(($close) => {
		$close.addEventListener('click', () => {
			commentsModalClasses.toggle('is-active');
		});
	});
	(document.querySelectorAll('.comments-modal .modal-background') || []).forEach(($background) => {
		$background.addEventListener('click', () => {
			commentsModalClasses.toggle('is-active');
		});
	});
	(document.querySelectorAll('.comments-modal .cancel') || []).forEach(($cancel) => {
		$cancel.addEventListener('click', () => {
			commentsModalClasses.toggle('is-active');
		});
	});
	// Open and close accordion on header click.
	// Toggle up and down arrows.
	if (accordionHeader) {
		accordionHeader.addEventListener('click', () => {
			const headerClasses = accordionHeader.classList;
			headerClasses.toggle('is-active');
			const icon = accordionHeader.lastElementChild;
			let iconClasses = icon.classList;
			if (headerClasses.contains('is-active')) {
				iconClasses.replace('fa-chevron-down', 'fa-chevron-up');
			} else {
				iconClasses.replace('fa-chevron-up', 'fa-chevron-down');
			}
		});
	}
});
