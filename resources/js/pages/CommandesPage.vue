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
                        <th scope="col">QUANTITE</th>
                        <th scope="col">PRIX</th>
                        <th scope="col">PRIX TOTAL</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="Service in Commande.services" :key="Service.id">
                        <td>{{Service.name}}</td>
                        <td><i class="fas fa-dollar-sign"></i>{{Service.quantity}}</td>
                        <td><i class="fas fa-dollar-sign"></i>{{Service.price}}</td>
                        <td><i class="fas fa-dollar-sign"></i>{{Service.price}}</td>
                        <td>
                          <button v-if="Commande.status==0"
                      @click="fillFieldEdit(Service.id,Service.name,Service.price,Service.quantity)"
                      class="btn btn-success"
                      style="color: white; border-radius: 20px"
                      data-bs-toggle="modal"
                      data-bs-target="#MyModalEdit"
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
                    </button >
                        </td>
                        <td>                    <button v-if="Commande.status==0"
                      
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
                    </button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                            <div class="d-flex justify-content-center">
                <button  v-if="Commande.status==0" style="border-radius: 40px;" class="btn m-1" data-bs-toggle="modal" data-bs-target="#MyModalEdit"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>

        
            </div>
                <hr />
                <div class="row">
                  <div class="col-xl-8" style="margin-left: 60px">
                    <p
                      class="float-end"
                      style="
                        font-size: 30px;
                        color: red;
                        font-weight: 400;
                        font-family: Arial, Helvetica, sans-serif;
                      "
                    >
                      Total:
                      <span><i class="fas fa-dollar-sign"></i> 6350,00</span>
                    </p>
                  </div>
                </div>

                <div class="row mt-2 mb-5">
                  <div class="col-10">
                    <p class="fw-bold">
                      Date: <span class="text-muted">{{commandeDate(Commande.date)}}</span>
                    </p>
                  </div>
                  <div class="col-1">
                    <button  v-if="Commande.status==0"
                      @click="fillFieldEditCommande(Commande.id,Commande.name,Commande.date,Commande.status)"
                      class="btn btn-success"
                      style="color: white; border-radius: 20px"
                      data-bs-toggle="modal"
                      data-bs-target="#MyModalEditCommande"
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
  </div>
                              <div class="d-flex justify-content-center">
                <button  style="border-radius: 40px;" class="btn m-1" data-bs-toggle="modal" data-bs-target="#addCommande"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>

        
            </div>
            <div class="btn-group tel-pop" role="group">
            <div class="modal" id="MyModalEditCommande">
              <div class="modal-dialog">
                <div class="modal-content">
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                  ></button>
                  <div class="modal-header">
                    <h3 class="modal-title">
                      Modifier le service
                    </h3>
                  </div>

                  <div class="modal-body">
                       <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Nom de Commande</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="commande.name" />
                        
                        </div>
                        <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Date De Commande</label>
                        <input type="date" id="formControlDefault" class="form-control " v-model="commande.date"  />
                        
                        </div>
                  </div>

                  <div class="modal-footer">

                            

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


  <div class="btn-group tel-pop" role="group">
    <div class="modal" id="MyModalEdit">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
          ></button>
          <div class="modal-header">
            <h3 class="modal-title">SERVICE</h3>
          </div>
           
          <div class="modal-body">
            <div class="row text-center">
              <div class="col-9">{{service.name}}</div>
              <div class="col-2 row">

                <div class="col-6">
                  <input :value="service.quantity" class="form-control" type="number" />
                </div>

              </div>
              <div class="col-1">
                <button
                  
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

          <div class="modal-footer p-4 text-center">
            <div class="col-10">
            </div>
            <div class="col">
              <button
                class="btn"
                style="background-color: #09a5be; color: white"
                data-bs-dismiss="modal"
                @click="onClickUpdate"
              >
                Modifier
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

              <div class="btn-group tel-pop" role="group">
            <div class="modal" id="addCommande">
              <div class="modal-dialog">
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
                       <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Nom de Commande</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="commande.name" />
                        
                        </div>
                        <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Date de commande</label>
                        <input type="date" id="formControlDefault" class="form-control " v-model="commande.date"   />
                        
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
moment.locale('fr'); 
import { useCommandes } from "../plugins/store";
import { ref, onMounted } from "vue";

export default {
  name: "CommandesPage",
  data() {
    return {};
  },
  props: {},
  methods: {
    commandeDate(date) {
      return moment(date).format('MMMM Do YYYY, h:mm:ss a')
    }
  },
  setup() {
    const { commandes, addCommande, updateCommande, deleteCommande, fetchCommandes } = useCommandes();
    const commande = ref({ id: null, name: null, date: null,status:null });
    const service = ref({ id: null, name: null,price: null,quantity:null });
    const clear = () => {
      commande.value = { id: null, name: null, date: null };
    };

    const onClickAdd = () => {
      console.log(commande.value.date)
      addCommande(commande.value.name, commande.value.date,commande.value.status);
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
      const fillFieldEditCommande = (id,name,date,status) => {
         commande.value = {id:id,name: name,date:date,status:status };
        
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
    const calculTotal = (quantity,price) => {
         service.value = {id:id,name: name,price:price };
        
        };
    onMounted(() => {
      fetchCommandes();
    });
              

    return {
      commandes,
      commande,
       service,
       fillFieldEditCommande,
       calculTotal,
      onClickAdd,
      onClickUpdate,
      onClickDelete,
      changeStatus,
    };
  },
};
</script>


<style lang="scss" scoped>
@import "../../sass/popup.scss";
</style>