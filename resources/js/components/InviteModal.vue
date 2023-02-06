<template>
  <!-- popup -->
  <v-popup
      :popupTitle  = popupTitle
      :addInfo     = addInfo
      @handleBtn   = "sendData"
  >
    <div class="mod-block">
      <input
          id="email"
          type="email"
          class="form-control @error('email') is-invalid @enderror"
          name="email"
          v-model="email"
          required
          placeholder="Enter people E-mails"
          style="width: 459px;"
      >
      <button class="sec-btn" @click="addEmailToList">Add</button>
    </div>
    <div id="mail-services" class="mod-block">
      <span>{{ 'or add from' }}</span>
      <img src="../../assets/yahoo.svg" class="handler" alt="yahoo"/>
      <img src="../../assets/gmail.svg" class="handler" alt="gmail"/>
      <img src="../../assets/aol.svg"   class="handler" alt="aol"/>
      <img src="../../assets/cloud.svg" class="handler" alt="cloud"/>
    </div>
    <hr />
    <span v-if="isLoading" class="mod-block">{{ 'Loading roles...' }}</span>
    <div id="emailList" class="list-wrap" v-if="!isLoading">
      <div v-for="(user, index) in emailList" class="list-block list-item">
        <div class="user-item">
          <span>
            <div class="name">{{ user.fullname }}</div>
            <div class="email">{{ user.email }}</div>
          </span>
          <v-select :roles="roles" :curRole="roles.find(el => el.id === user.role)" :userId="index" @setRole="setUserRole"/>
        </div>
        <span><font-awesome-icon icon="fa-solid fa-circle-minus" class="ico handler"  @click="delEmailFromList(index)" /></span>
      </div>
    </div>
    <hr v-if="emailList.length > 0" />
    <div class="mod-block">
      <input
          id="message"
          type="text"
          class="form-control @error('email') is-invalid @enderror"
          name="message"
          v-model="message"
          required
          placeholder="Personal message (optional)"
          style="width: 100%;"
      >
    </div>
  </v-popup>

</template>

<script>
import vPopup   from './popup/v-popup'
import vSelect  from './select/v-select'
import { faker } from '@faker-js/faker';

export default {
  name: "invite-modal",
  components: {
    vSelect,
    vPopup
  },
  data() {
    return{
      popupTitle  : 'Invite others',
      addInfo     : '',
      email       : '',
      message     : '',
      emailList   : [],
      roles       : [],
      isLoading   : false,
      selectedRole: 1,
    }
  },
  mounted() {
    // loadRoles
    this.isLoading = true;
    axios.get('/api/getuserroles').then((res) => {
      // console.log('Roles:', res.data);
      this.roles = res.data;
      this.isLoading = false;
    }).catch(() => {
        console.error('FAILURE');
    });
  },
  methods: {
    addEmailToList() {
      if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))){
        alert("Email invalid");
        return;
      }
      if (this.emailList.find(el => el.email === this.email)){
        alert("Email already exist");
        return;
      }

      const fullName = faker.name.firstName() + ' ' +faker.name.lastName();

      this.emailList.push({'email':this.email, 'role': 2, 'fullname': fullName});
      this.setAddInfo();
      // console.log('Email list:', this.emailList);
    },
    setUserRole(role, userId) {
      // console.log('setUserRole', role, userId);
      this.emailList[userId].role = role.id;
    },
    setAddInfo() {
      this.addInfo = this.emailList.length + ' recipients';
    },
    delEmailFromList(index) {
      this.emailList.splice(index, 1);
      this.setAddInfo();
    },
    sendData(){
      if(!message || message === '') {
        alert('Write the message');
        return;
      }
      axios.post('/api/sendmail',{
        emailList : this.emailList,
        message   : this.message
      }).then(()=>{
        this.$emit('closePopup');
      }).catch((err) => {
        console.error('FAILURE:', err.response.data.message);
        alert(err.response.data.message);
      });
    }
  }
}
</script>

<style lang="scss">
  .mod-block {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 0 24px;
    gap: 12px;
    height: 48px;
  }

  .list-block {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 0 12px 0 24px;
    gap: 12px;
    height: 48px;
  }

  .list-wrap {
    max-height:400px;
    margin: 0 6px 0 0;
    overflow-y:auto;
  }
  .list-wrap::-webkit-scrollbar {
      width: 4px;
  }
  .list-wrap::-webkit-scrollbar-track {
      border-radius: 2px;
  }
  .list-wrap::-webkit-scrollbar-thumb {
      background: #DFD8CF;
      border-radius: 2px;
  }
  .list-wrap::-webkit-scrollbar-thumb:hover {
      background: #DFD8CF;
  }

  input {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    padding: 12px 16px;
    gap: 8px;

    height: 48px;

    background: #FFFFFF;
    border: 1px solid rgba(51, 51, 51, 0.16);
    border-radius: 6px;
    
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
  }
  .list-item { margin: 12px 0 }
  .user-item {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 6px 16px 6px 12px;
    gap: 16px;

    width: 518px;
    height: 48px;

    background: #F6EFE6;
    border-radius: 6px;

    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #3C1F1D;
  }
  .ico {
    width: 20px;
    height: 20px;
    color: #D1CAC1;
  }
  .ico:active {
    color: red;
  }
  #mail-services {
    margin-top: 16px;
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #3C1F1D;
  }
  .handler { cursor:pointer }
  hr {
    border: none;
    color: #D1CAC1;
    background-color: #D1CAC1;
    height: 1px;
  }
  .name {
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #3C1F1D;
  }
  .email {
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #876A68;
  }

</style>