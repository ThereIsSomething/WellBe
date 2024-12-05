document.addEventListener('DOMContentLoaded', () => {
    const profileContainer = document.getElementById('profileContainer');
    const editModeElements = document.querySelectorAll('.edit-mode');
    const viewModeElements = document.querySelectorAll('.view-mode');
    const editModeButtons = document.querySelectorAll('.edit-mode-btn');
    const viewModeButtons = document.querySelectorAll('.view-mode-btn');

    const editName = document.getElementById('editName');
    const editDOB = document.getElementById('editDOB');
    const editGmail = document.getElementById('editGmail');
    const editPhone = document.getElementById('editPhone');
    const editProfession = document.getElementById('editProfession');

    const viewName = document.getElementById('viewName');
    const viewDOB = document.getElementById('viewDOB');
    const viewGmail = document.getElementById('viewGmail');
    const viewPhone = document.getElementById('viewPhone');
    const viewProfession = document.getElementById('viewProfession');

    const areasToImproveView = document.getElementById('areasToImproveView');
    const areasToImproveEdit = document.getElementById('areasToImproveEdit');
    const addAreaBtn = document.getElementById('addAreaBtn');

    const personalInterestsView = document.getElementById('personalInterestsView');
    const personalInterestsEdit = document.getElementById('personalInterestsEdit');
    const addInterestBtn = document.getElementById('addInterestBtn');

    function toggleEditMode(isEditing) {
        editModeElements.forEach(el => el.style.display = isEditing ? 'block' : 'none');
        viewModeElements.forEach(el => el.style.display = isEditing ? 'none' : 'block');
    }

    document.querySelector('.edit-btn').addEventListener('click', () => {
        editName.value = viewName.textContent;
        editDOB.value = '2006-11-25';
        editGmail.value = viewGmail.textContent;
        editPhone.value = viewPhone.textContent;
        editProfession.value = viewProfession.textContent;

        populateEditList(areasToImproveView, areasToImproveEdit);

        populateEditList(personalInterestsView, personalInterestsEdit);

        toggleEditMode(true);
    });

    document.querySelector('.save-btn').addEventListener('click', () => {
        viewName.textContent = editName.value;
        viewDOB.textContent = editDOB.value;
        viewGmail.textContent = editGmail.value;
        viewPhone.textContent = editPhone.value;
        viewProfession.textContent = editProfession.value;

        saveListChanges(areasToImproveEdit, areasToImproveView);

        saveListChanges(personalInterestsEdit, personalInterestsView);

        toggleEditMode(false);
    });

    document.querySelector('.cancel-btn').addEventListener('click', () => {
        toggleEditMode(false);
    });

    function populateEditList(viewList, editList) {
        editList.innerHTML = '';
        viewList.querySelectorAll('li').forEach(item => {
            const listItem = document.createElement('div');
            listItem.classList.add('list-item');

            const input = document.createElement('input');
            input.type = 'text';
            input.value = item.textContent;

            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'Remove';
            removeBtn.classList.add('remove-btn');
            removeBtn.addEventListener('click', () => {
                listItem.remove();
            });

            listItem.appendChild(input);
            listItem.appendChild(removeBtn);
            editList.appendChild(listItem);
        });
    }
    function saveListChanges(editList, viewList) {
        const listItems = editList.querySelectorAll('.list-item input');
        const newList = document.createElement('ul');

        listItems.forEach(input => {
            if (input.value.trim()) {
                const li = document.createElement('li');
                li.textContent = input.value.trim();
                newList.appendChild(li);
            }
        });

        viewList.innerHTML = newList.innerHTML;
    }

    addAreaBtn.addEventListener('click', () => {
        const listItem = document.createElement('div');
        listItem.classList.add('list-item');

        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'New Area';

        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.classList.add('remove-btn');
        removeBtn.addEventListener('click', () => {
            listItem.remove();
        });

        listItem.appendChild(input);
        listItem.appendChild(removeBtn);
        areasToImproveEdit.appendChild(listItem);
    });

    addInterestBtn.addEventListener('click', () => {
        const listItem = document.createElement('div');
        listItem.classList.add('list-item');

        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'New Interest';

        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.classList.add('remove-btn');
        removeBtn.addEventListener('click', () => {
            listItem.remove();
        });

        listItem.appendChild(input);
        listItem.appendChild(removeBtn);
        personalInterestsEdit.appendChild(listItem);
    });
});
