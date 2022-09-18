import { reactive, computed } from 'vue';
import { api } from '../axios';

export const useServices = () => {
    const state = reactive({
        services: [],
    });

    const addService = (name,price) => {
        if (name != null && price != null) {
            api.post('/api/services/service/add', { name: name,price:price })
                .then((response) => {
                    state.services.push({id : response.data.id, name: name,price:price });
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    };
    const updateService = (id,name,price) => {
            const index = state.services.findIndex((el) => el.id === id);
            if (index >= 0) {
                state.services[index].name=name;
                state.services[index].price=price;

                
            api.post(`/api/services/service/update/${id}`, { name: name,price:price })
                .then((response) => {})
                .catch((error) => {
                    console.error(error);
                });
            }
        
    };
    const deleteService = (id) => {
        const index = state.services.findIndex((el) => el.id === id);
        if (index >= 0) {
            state.services.splice(index, 1);

            api.post(`/api/services/service/delete/${id}`)
                .then((response) => {})
                .catch((error) => {
                    console.error(error);
                });
        }
    };

    const fetchServices = () => {
        api.get('/api/services/list')
            .then((response) => {
                state.services = response.data.services;
            })
            .catch((error) => {
                console.error(error);
            });
    };

    const assignCommande = (service_id,commande_id) => {
        if (service_id != null && commande_id != null ) {
            api.post('/api/services/service/assignCommande', { service_id: service_id,commande_id:commande_id})
                .catch((error) => {
                    console.error(error);
                });
        }
    };
    return {
        services: computed(() => state.services),
        addService,
        updateService,
        deleteService,
        assignCommande,
        fetchServices,
    };
};

export const useCommandes = () => {
    const state = reactive({
        commandes: [],
    });

    const addCommande = (name,description) => {
        if (name != null && description != null){
            api.post('/api/commandes/commande/add', {name:name,description:description})
            .then((response)=>{
                state.commandes.push({id:response.data.id,name:name,description:description});
            })
            .catch((error)=> {
                console.error(error);
            })
        }
    };

    const deleteCommande = (id) => {
        const index = state.commandes.findIndex((el) => el.id === id);
        if (index >= 0){
            state.commandes.splice(index,1);

            api.post(`/api/commandes/commande/delete/${id}`)
            .then((response) => {})
            .catch((error) => {
                console.error(error);
            });
        }
    };

    const fetchCommandes = () => {
        api.get('/api/commandes/list')
        .then((response) => {
            state.commandes = response.data.commandes;
        })
        .catch((error) => {
            console.error(error);
        })
    };

    return {
        commandes: computed(() => state.commandes),

        addCommande,
        deleteCommande,

        fetchCommandes,
    };
};


