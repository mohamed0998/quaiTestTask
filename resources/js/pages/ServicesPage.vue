<template>
<div class="row" style="font-size:10px"> 
<div class="col-3 p-1" v-for="Service in services" :key="Service.id" >
  <div class="card">
   
      <div class="card-header">
         <div class="row">
           <div class="col">  {{Service.reference}}</div>
          </div>
        <div class="row mt-3">
    <div class="col">{{Service.name}} </div>
        </div>
          <div class="row mt-3">

            <div class="col-3"> Prix</div> <div class="col-8 text-end"> {{Service.price}} €</div>
          </div>
  </div>
  <div class="card-body">
    <div>   <img class="card-img-top" src="https://cdn.onlinewebfonts.com/svg/img_419835.png" alt="Card image cap">
</div>

  </div>
  <div class="card-footer">
    <div class="row text-center">
      <div class="col">
              <button @click="fillFieldEdit(Service.id,Service.name,Service.price)"   class="btn btn-success" style="color: white; border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#MyModalEdit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button>
  </div>
        <div class="col">
      <button
    @click="onClickDelete(Service.id)"
    class="btn btn-danger"
    style="color: white; border-radius: 20px;"
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
</div>
</div>
    <div>
      
     
            <div class="d-flex justify-content-center">
                <button style="border-radius: 40px;" class="btn m-1" data-bs-toggle="modal" data-bs-target="#MyModal"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>

        
            </div>

            <div class="btn-group tel-pop" role="group">
            <div class="modal" id="MyModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                  ></button>
                  <div class="modal-header">
                    <h3 class="modal-title">
                      Ajouter un service
                    </h3>
                  </div>

                  <div class="modal-body">
                       <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Nom de service</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="service.name" />
                        
                        </div>
                        <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Prix de service</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="service.price" />
                        
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


            <div class="btn-group tel-pop" role="group">
            <div class="modal" id="MyModalEdit">
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
                        <label class="form-label" for="formControlDefault">Nom de service</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="service.name" />
                        
                        </div>
                        <div class="col-11 ms-4">
                        <label class="form-label" for="formControlDefault">Prix de service</label>
                        <input type="text" id="formControlDefault" class="form-control " v-model="service.price" />
                        
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
        </div>

      <div>
  </div>

           
</template>

<script>
import { useServices} from '../plugins/store';
import { api } from '../plugins/axios';
import { ref, onMounted } from 'vue';
export default {
    name: 'servicesPage',
        data() {
        return {
            ids:{},
                name: '',
                file: '',
                success: '',
            choseserviceId:false
        };
    },
    setup() {
        const { services, result, addService, updateService, deleteService, fetchServices} = useServices();
        const service = ref({ id: null, name: null,price: null });
        const serviceAssign = ref({serviceId: null, taskId:null})
        const clear = () => {
            service.value = { name: null,price: null };
        };

        const onClickAdd = () => {
            addService(service.value.name,service.value.price);
            clear();
        };

        const onClickDelete = (id) => {
             service.value.id=id;
            deleteService(service.value.id);
            clear();
        };
        const onClickUpdate = () => {

            updateService(service.value.id,service.value.name,service.value.price);
            clear();
        };
        const fillFieldEdit = (id,name,price) => {
         service.value = {id:id,name: name,price:price };
        
        };       

        onMounted(() => {
            fetchServices();
        });

        return {
            services,
            result,
            service,
            serviceAssign,
            onClickAdd,
            onClickUpdate,
            onClickDelete,
            fillFieldEdit,
        };
    },
    methods :{
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/popup.scss";
</style>
