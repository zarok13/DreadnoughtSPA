export default $axios=>({
    [GET_MAPBOX_DATA](state) {
        if (getDataFromLocalStorage(state, GET_MAPBOX_DATA, SET_MAPBOX_DATA)) {
            console.log('mapbox parsed from local storage');
        } else {
            request.get('mapbox')
                .then(data => {
                    let mapbox = data.data;
                    mapbox.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_MAPBOX_DATA, JSON.stringify(mapbox));
                    state.commit(SET_MAPBOX_DATA, mapbox);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
})