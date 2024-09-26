import "./bootstrap";
// import Livewire from 'livewire';

const model = document.getElementById("model");
const x = document.getElementById("model_btn");
const xx = document.getElementById("second_model_btn");
const fogdiv = document.getElementById("fogdiv");
const optionsModel = document.getElementById("optionsModel");

x.addEventListener("click", () => {
    model.classList.add("hidden");
    fogdiv.classList.add("hidden");
});

if(xx){
    xx.addEventListener("click", () => {
        optionsModel.classList.add("hidden");
        fogdiv.classList.add("hidden");
    });
}

const forms = document.getElementsByClassName("main-form")
Array.from(forms).forEach((form)=>{
    form.addEventListener("submit", (e)=>{
        e.preventDefault(); // <- Corrected
        const formData = new FormData(e.target);
        const emploi_id = e.target.id
        const data = {
            emploi_id,
            'jour_id': formData.get("jour_id"),
            'heure_debut': formData.get("heure_debut"),
            'heure_fin': formData.get("heure_fin"),
            'salle_id': formData.get("salle_id"),
            'type_id': formData.get("type_id"),
            'groupe_id': formData.get("groupe_id"),
        }
        Livewire.dispatch('dataReceived',{'data': data});
    });
});


const checkBoxes = document.getElementsByClassName("absence-checkBox")

Array.from(checkBoxes).forEach((checkbox)=>{
    let checkboxData = []
    checkbox.addEventListener("click", (e)=>{
        console.log(e.target.value)
    })
})

const dispatchCheckbox = (result)=>{
    Livewire.dispatch('checkbox-data',{'data': result});
}

