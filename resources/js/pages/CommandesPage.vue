<template>
  <div
    class="accordion accordion-flush mt-5 mb-5"
    :id="'accordionFlushExample'+Commande.id"
    v-for="Commande in commandes"
    :key="Commande.id"
  >
  
    <div class="form-check form-switch">
      <input
      v-model="Commande.status"
      @change="changeStatus(Commande.id,Commande.name,Commande.date,'CheckCommande'+Commande.id)"
        class="form-check-input"
        type="checkbox"
        :id="'CheckCommande'+Commande.id"
        
      />
      <label class="form-check-label" for="flexSwitchCheckDefault">Fermé</label>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" :id="'flush-headingOne'+Commande.id">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          :data-bs-target="'#flush-collapseOne'+Commande.id"
          aria-expanded="false"
          :aria-controls="'flush-collapseOne'+Commande.id"
        >
          {{Commande.name}}
        </button>
      </h2>
      <div
        :id="'flush-collapseOne'+Commande.id"
        class="accordion-collapse collapse"
        :aria-labelledby="'flush-headingOne'+Commande.id"
        :data-bs-parent="'#accordionFlushExample'+Commande.id"
      >
        <div class="accordion-body">
          <div class="card">
            <div class="card-header bg-black"></div>
            <div class="card-body">
              <div class="container">
                <div class="row text-center">
                  <h3
                    class="text-uppercase text-center mt-3"
                    style="font-size: 40px"
                  >
                    Bon de commande
                  </h3>
                  <p>{{Commande.reference}}</p>
                </div>

                <div class="row mx-3">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SERVICES</th>
                        <th scope="col">PRIX</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRIX TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="Service in Commande.services" :key="Service.id">
                        <td>{{Service.name}}</td>
                        <td>{{Service.price}}</td>
                        <td>{{Service.pivot.quantity}}</td>
                        <td>{{Service.pivot.total}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr />

                <div class="row mt-2 mb-5">
                  <div class="col-10">
                    <p class="fw-bold">
                      Date: <span class="text-muted">{{commandeDate(Commande.date)}}</span>
                    </p>
                  </div>
                  <div class="col-1">
                    <button  v-if="Commande.status==0"
                      class="btn btn-success"
                      style="color: white; border-radius: 20px"
                      data-bs-toggle="modal"
                      :data-bs-target="'#MyModalEditCommande'+Commande.id"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-pencil-square"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="col-1">
                    <button  v-if="Commande.status==0"
                      @click="onClickDelete(Commande.id)"
                      class="btn btn-danger"
                      style="color: white; border-radius: 20px"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="14"
                        fill="currentColor"
                        class="bi bi-trash-fill"
                      >
                        <path
                          d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="card-footer bg-black"></div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
          <div class="btn-group tel-pop" role="group">
            <div class="modal" :id="'MyModalEditCommande'+Commande.id">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                  ></button>
                  <div class="modal-header">
                    <h3 class="modal-title">
                      Modifier la commande
                    </h3>
                  </div>

                  <div class="modal-body">
                    <div class="row mb-4 p-2">
                       <div class="col-6">
                        <label class="form-label" for="formControlDefault">Nom de Commande</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="Commande.name" />
                        
                        </div>
                        <div class="col-6">
                        <label class="form-label" for="formControlDefault">Date De Commande</label>
                        <input type="date" id="formControlDefault" class="form-control " v-model="Commande.date"  />
                        </div>
                        </div>
                        <div  v-for="Service in Commande.services" :key="Service.id" class="row text-center mb-2">
                          <hr>
              <div class="col-9">{{Service.name}}</div>
              <div class="col-2 row">

                <div class="col-6">
                  <input  @change="onUpdateTotal(Service.pivot.id,Service.pivot.quantity,Service.price)"  v-model="Service.pivot.quantity"  class="form-control" type="number" />
                </div>

              </div>
              <div class="col-1">
                <button
                  @click="onDeleteRelation(Service.pivot.id,Service.id)"
                  class="btn btn-danger"
                  style="color: white; border-radius: 20px"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="14"
                    fill="currentColor"
                    class="bi bi-trash-fill"
                  >
                    <path
                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                    />
                  </svg>
                </button>
              </div>
              
            </div>
            
                   
                  </div>

                  <div class="modal-footer">

                      <input v-model="letter" type="text"  class ="form-control">
                  <select  class="form-select" multiple aria-label="multiple select example">
                   <option @click="addServiceToCommande(Service.id,Commande.id)" v-for="Service in getFiltredServices()" :key="Service.id" class="col-12"> {{Service.name}}</option>
                    
                          

                    
                  </select>     

                    <button
                      class="btn"
                      style="background-color: #09a5be; color: white"
                      data-bs-dismiss="modal"
                      @click="onClickUpdate"
                    >
                      Valider
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
                              <div class="d-flex justify-content-center">
                <button  style="border-radius: 40px;" class="btn m-1" data-bs-toggle="modal" data-bs-target="#addCommande"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>

        
            </div>


              <div class="btn-group tel-pop" role="group">
            <div class="modal" id="addCommande">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                  ></button>
                  <div class="modal-header">
                    <h3 class="modal-title">
                      Ajouter une commande
                    </h3>
                  </div>

                  <div class="modal-body">
                       <div class="col-11 row  ms-4">
                         <div class="col">
                        <label class="form-label" for="formControlDefault">Nom de Commande</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="commande.name" />
                         </div>
                          <div class="col">
                        <label class="form-label" for="formControlDefault">Date de commande</label>
                        <input type="date" id="formControlDefault" class="form-control " v-model="commande.date"   />
                        </div>
                        </div>
                  </div>

                  <div class="modal-footer">

                             

                    <button
                      class="btn"
                      style="background-color: #09a5be; color: white"
                      
                      @click="onClickAdd"
                    >
                      Valider
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

</template>

<script>
import moment from 'moment'
import { useCommandes, useServices } from "../plugins/store";
import { ref, onMounted } from "vue";

export default {
  name: "CommandesPage",
  data() {
    return {
    };
  },
  props: {},
  methods: {
    commandeDate(date) {
      return moment(date).format('DD/MM/YYYY')
    },
  },
  setup() {
    const { commandes, addCommande, updateCommande, updateTotal, deleteCommande, fetchCommandes,deleteRelation,assignService } = useCommandes();
    const {services,fetchServices}=useServices();
    const commande = ref({ id: null, name: null, date: null,status:null,services:null });
    const selectedService = ref({ id: null, name: null,price: null});

    const letter =ref('');
    const clear = () => {
      commande.value = { id: null, name: null, date: null };
    };

    const onClickAdd = () => {
      //console.log(commande.value.date)
      addCommande(commande.value.name, commande.value.date);
      fetchCommandes();
      clear();
    };
        const onClickUpdate = () => {

           updateCommande(commande.value.id,commande.value.name,commande.value.date,commande.value.status);
            clear();
        };
    const onClickDelete = (id) => {
      commande.value.id=id;
      deleteCommande(commande.value.id);
      clear();
    };
      const fillFieldEditCommande = (id,name,date,status,services) => {
         commande.value = {id:id,name: name,date:date,status:status,services:services };
        
        };
      const changeStatus =(id,name,date,checkId)=> {
         if(document.getElementById(checkId).checked){
        updateCommande(id,name,date,1);
        fetchCommandes();
        }
        else{
        updateCommande(id,name,date,0);
        fetchCommandes();
            
         } 
          clear();
      };

     const  onUpdateTotal = (id,quantity,price)=>{
              updateTotal(id,quantity,price);
               fetchCommandes();
     };
     const onDeleteRelation= (id) =>{
           deleteRelation(id);
           fetchCommandes();
     };
     const getFiltredServices = () =>{
      return services.value.filter(service => {
        return service.name.toLowerCase().includes(letter.value.toLowerCase());

      })

     }
     const addServiceToCommande = (service_id,commande_id) =>{
      assignService(service_id,commande_id);
      fetchCommandes();
      fetchServices();
     }

    onMounted(() => {
      fetchCommandes();
      fetchServices();
    });
              

    return {
      commandes,
      commande,
       selectedService,
       services,
       letter,
       fillFieldEditCommande,
      onClickAdd,
      onClickUpdate,
      onClickDelete,
      changeStatus,
      onUpdateTotal,
      onDeleteRelation,
      getFiltredServices,
      addServiceToCommande,
    };
  },
};
</script>


<style lang="scss" scoped>
@import "../../sass/popup.scss";
</style>