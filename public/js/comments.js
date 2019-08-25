document.addEventListener('DOMContentLoaded', () => {
	const commentForm = document.querySelector('form[name="comment"]');
	const replyForms = document.querySelectorAll('form[name="reply"]');
	const commentContentElements = document.querySelectorAll('.comment-content');
	const error = document.querySelector('.error');
	const closeBtns = document.querySelectorAll('.cancel-reply');
	// Toggle the visibility of the comment and reply forms.
	(document.querySelectorAll('.reply') || []).forEach(($reply, $index) => {
		$reply.addEventListener('click', () => {
			commentForm.classList.add('is-hidden');
			replyForms[$index].classList.remove('is-hidden');
			Array.from(replyForms).filter((_, idx) => idx !== $index).forEach((form) => {
				form.classList.add('is-hidden');
			});
		});
		if (error == commentContentElements[$index]) {
			commentForm.classList.add('is-hidden');
			replyForms[$index].classList.remove('is-hidden');
		}
	});
	(closeBtns || []).forEach(($btn, $index) => {
		$btn.addEventListener('click', (e) => {
			e.preventDefault();
			replyForms[$index].classList.add('is-hidden');
			commentForm.classList.remove('is-hidden');
		});
	});

	const deleteCommentCheckboxes = document.querySelectorAll('input[name="delete-comment-checkbox"]');
	const deleteReplyCheckboxes = document.querySelectorAll('input[name="delete-reply-checkbox"]');
	const commentIds = document.querySelector('input[name="commentIds"]');
	const replyIds = document.querySelector('input[name="replyIds"]');

	(deleteCommentCheckboxes || []).forEach(($checkbox) => {
		$checkbox.addEventListener('change', () => {
			// Use the comment IDs from the hidden inputs.
			let commentIdList = commentIds.value !== '' ? commentIds.value.split(',') : [];
			$checkboxId = $checkbox.getAttribute('id');
			const commentId = $checkboxId.substring($checkboxId.lastIndexOf('-') + 1);
			// Add the ID if checkbox is checked; remove it if it's unchecked.
			if ($checkbox.checked) {
				commentIdList.push(commentId);
			} else {
				commentIdList.splice(commentIdList.indexOf(commentId), 1);
			}
			commentIds.value = commentIdList.join(',');
		});
	});
	// Perform above process for replies too.
	(deleteReplyCheckboxes || []).forEach(($checkbox) => {
		$checkbox.addEventListener('change', () => {
			let replyIdList = replyIds.value !== '' ? replyIds.value.split(',') : [];
			$checkboxId = $checkbox.getAttribute('id');
			const replyId = $checkboxId.substring($checkboxId.lastIndexOf('-') + 1);
			if ($checkbox.checked) {
				replyIdList.push(replyId);
			} else {
				replyIdList.splice(replyIdList.indexOf(replyId), 1);
			}
			replyIds.value = replyIdList.join(',');
		});
	});

	const sortCommentsDropdown = document.querySelector('#sort-comments-dropdown');
	const sortCommentsForm = document.querySelector('form[name="sort-comments-form"]');
	const sortCommentsItems = document.querySelectorAll('#sort-comments-dropdown .dropdown-item');
	const sortCommentsInput = document.querySelector('input[name="sortBy"]');
	// Show the sort comments dropdown.
	sortCommentsDropdown.addEventListener('click', () => {
		sortCommentsDropdown.classList.toggle('is-active');
	});
	// Put the dropdown item text into the hidden input
	// and submit the form.
	sortCommentsItems.forEach(($item) => {
		$item.addEventListener('click', () => {
			sortCommentsInput.value = $item.textContent;
			sortCommentsForm.submit();
		});
	});

	const likesForm = document.querySelector('form[name="likes-form"]');
	const likesFormFieldset = document.querySelector('form[name="likes-form"] fieldset');
	const likeBtn = document.querySelector('#like-btn');
	const likeInput = document.querySelector('input[name="like"]');
	const dislikeBtn = document.querySelector('#dislike-btn');
	const dislikeInput = document.querySelector('input[name="dislike"]');
	// Check the hidden checkboxes for like/dislike and submit the form.
	if (likeBtn) {
		likeBtn.addEventListener('click', () => {
			if (!likesFormFieldset.hasAttribute('disabled')) {
				likeInput.setAttribute('checked', '');
				likesForm.submit();
			}
		});
	}
	if (dislikeBtn) {
		dislikeBtn.addEventListener('click', () => {
			if (!likesFormFieldset.hasAttribute('disabled')) {
				dislikeInput.setAttribute('checked', '');
				likesForm.submit();
			}
		});
	}
});
