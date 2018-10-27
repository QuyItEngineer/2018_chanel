const mutations = {
    exampleMutation(state, {id}) {
        state.items.push({
            id,
            quantity: 1,
        });
    },
};

export default mutations;
