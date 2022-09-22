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

    return {
        services: computed(() => state.services),
        addService,
        updateService,
        deleteService,
        fetchServices,
    };
};

export const useCommandes = () => {
    const state = reactive({
        commandes: [],
        total: []
    });

    const addCommande = (name,date) => {
        if (name != null && date != null){
            api.post('/api/commandes/commande/add', {name:name,date:date})
            .then((response)=>{
                state.commandes.push({id:response.data.id,name:name,date:date});
            })
            .catch((error)=> {
                console.error(error);
            })
        }
    };
    const updateCommande = (id,name,date,status) => {
        const index = state.commandes.findIndex((el) => el.id === id);
        if (index >= 0) {
            state.commandes[index].name=name;
            state.commandes[index].date=date;
            state.commandes[index].status=status;

            
        api.post(`/api/commandes/commande/update/${id}`, { name: name,date:date,status:status })
            .then((response) => {})
            .catch((error) => {
                console.error(error);
            });
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
    const updateTotal =(id,quantity,price) => {
        api.post(`/api/commandesServices/updateTotal/${id}/${quantity}/${price}`)
        .then((response) => {})
        .catch((error) => {
            console.error(error);
        });
       
        
    }
    const assignService =(service_id,commande_id) => {
        api.post('/api/commandesServices/assignService', { service_id: service_id,commande_id:commande_id })
        .then((response) => {})
        .catch((error) => {
            console.error(error);
        });
    }
    

    const fetchCommandes = () => {
        api.get('/api/commandes/list')
        .then((response) => {

            response.data.commandes.forEach((entry) => {
                entry.services.forEach((element)=>{
                    updateTotal(element.pivot.id,element.pivot.quantity,element.price)
                })
              if (entry.status==1)
                entry.status=true
                else
                entry.status=false
              });

             state.commandes = response.data.commandes; 
        })
        .catch((error) => {
            console.error(error);
        })

         
    };

    const deleteRelation =(id)=> {
        api.post(`/api/commandesServices/delete/${id}`)
        .then((response) => {})
        .catch((error) => {
            console.error(error);
        });
    }




    return {
        commandes: computed(() => state.commandes),

        addCommande,
        updateCommande,
        deleteCommande,
        updateTotal,
        fetchCommandes,
        deleteRelation,
        assignService
    };
};


