if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    init()
}

function init() {
    const data = {
        name: 'Каталог товаров',
        items: [
            {
                name: 'Мойки',
                items: [
                    {
                        name: 'Ulgran1',
                        items: [
                            {
                                name: 'SMT1',
                                items: []
                            },
                            {
                                name: 'SMT2',
                                items: []
                            }
                        ]
                    },
                    {
                        name: 'Ulgran2',
                        items: [
                            {
                                name: 'SMT3',
                                items: []
                            },
                            {
                                name: 'SMT4',
                                items: []
                            }
                        ]
                    }
                ]
            },
            {
                name: 'Фильтры',
                items: [
                    {
                        name: 'Ulgran3',
                        items: [
                            {
                                name: 'SMT5',
                                items: []
                            },
                            {
                                name: 'SMT6',
                                items: []
                            }
                        ]
                    }
                ]
            }
        ]
    }

    const items = new FoldersList(document.getElementById('list-items'), data)

    items.render()

    function FoldersList(el, data) {
        this.el = el;
        this.data = data;

        this.init = function () {
            const parents = this.el.querySelectorAll('[data-parent]');

            parents.forEach(parent => {
                const open = parent.querySelector('[data-open]');
                const add = parent.querySelector('[data-add]');
                const edit = parent.querySelector('[data-edit]');
                const remove = parent.querySelector('[data-remove]');

                open.addEventListener('click', () => this.toggleItems(parent));
                add.addEventListener('click', (e) => this.addFolder(e));
                edit.addEventListener('click', (e) => this.editFolderName(e));
                remove.addEventListener('click', (e) => this.removeFolder(e));
            })
        }

        this.render = function () {
            this.el.insertAdjacentHTML('beforeend', this.createMarkup(this.data))
            this.init();
        }

        this.createMarkup = function(data) {
            let markup = `
                <div class="list-item list-item_open" data-parent>
                    <div class="list-item__inner">
                        <img class="list-item__arrow" src="img/chevron-down.png" alt="chevron-down" data-open>
                        <img class="list-item__folder" src="img/folder.png" alt="folder">
                        <span class="list-item__name">
                            ${data.name}
                        </span>
                        <img class="list-item__add control-icon" src="img/plus.svg" alt="add-folder" data-add >
                        <img class="list-item__edit control-icon" src="img/edit.svg" alt="" srcset="" data-edit>
                        <img class="list-item__remove control-icon" src="img/minus.svg" alt="remove-folder" data-remove >
                    </div>
            `;

            if (data.items)
                for (let i = 0; i < data.items.length; i++)
                    markup += `
                        <div class="list-item__items">  
                            ${this.createMarkup(data.items[i])} 
                        </div>
                    `;

            return `${markup}</div>`;
        }

        this.toggleItems = function(parent) {
            parent.classList.toggle('list-item_open')
        }

        this.removeFolder = function({ target }) {
            const currentFolderName = target.parentElement.innerText;
            const currentFolderMarkup = target.closest('.list-item__items');
            const parentFolderName = target.closest('.list-item__items').parentElement.firstElementChild.innerText;

            const currentFolderData = this.findFolder(this.data, currentFolderName);
            const parentFolderData = this.findFolder(this.data, parentFolderName);

            parentFolderData.items.splice(parentFolderData.items.indexOf(currentFolderData), 1);
            currentFolderMarkup.remove();
        }

        this.findFolder = function(data, folderName) {
            if (data.name === folderName)
                return data;

            for (let i = 0; i < data.items.length; i++) {
                if (data.items[i].name === folderName) {
                    return data.items[i];
                } else {
                    if (data.items) {
                        let foundItem = this.findFolder(data.items[i], folderName);
                        if (foundItem)
                            return foundItem;
                    }
                }
            }
        }

        this.editFolderName = function({ target }) {
            const folderInner = target.parentElement;
            const folderName = target.parentElement.innerText;
            const folderData = this.findFolder(this.data, folderName);

            // set new child folder name
            const newFolderName = prompt('Новое название папки', folderName);
            if (!newFolderName)
                return;

            // select folder name and update it
            folderInner.querySelector('.list-item__name').innerText = newFolderName;
            folderData.name = newFolderName;
        }

        this.addFolder = function({ target }) {
            const parentFolderInner = target.parentElement;
            const parentFolderName = target.parentElement.innerText;
            const parentFolderData = this.findFolder(this.data, parentFolderName);

            // set new child folder name
            const newChildFolderName = prompt('Введите название папки')
            if (!newChildFolderName)
                return;

            // if everything is ok then unshift it
            const newChildFolderData = {
                name: newChildFolderName,
                items: [],
            }
            parentFolderData.items.unshift(newChildFolderData);

            // create new child folder
            const newChildFolderMarkup = document.createElement('div');
            newChildFolderMarkup.innerHTML = this.createMarkup(newChildFolderData);
            newChildFolderMarkup.classList.add('list-item__items');

            // adding some event listeners to created child folder
            newChildFolderMarkup.querySelector('[data-add]').addEventListener('click', (event) => {
                this.addFolder(event);
            })

            newChildFolderMarkup.querySelector('[data-open]').addEventListener('click', (event) => {
                this.toggleItems(event.target.closest('[data-parent]'));
            });

            newChildFolderMarkup.querySelector('[data-edit]').addEventListener('click', (event) => {
                this.editFolderName(event);
            });

            newChildFolderMarkup.querySelector('[data-remove]').addEventListener('click', (event) => {
                this.removeFolder(event);
            });

            // after attach created child folder to the page
            parentFolderInner.after(newChildFolderMarkup);
        }
    }
}
