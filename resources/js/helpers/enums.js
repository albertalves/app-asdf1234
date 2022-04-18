const INITIAL = 0;
const ADDED = 1;
const REMOVED = 2;

const actionTypeList = [
    {id: INITIAL, title: "Quantidade inicial: ",},
    {id: ADDED, title: "Quantidade adicionada: "},
    {id: REMOVED, title: "Quantidade removida: "},
];

const getTypeList = function (id) {
    let action = actionTypeList.filter(item => item.id == id)
    return action[0].title;
};


export {
    getTypeList,
    actionTypeList,
    INITIAL,
    ADDED,
    REMOVED,
}
