<template>
  <div class="container">
        <k-progress 
          v-if="verylawpwd"
          status="success" 
          type="line"
          :percent="20"  
          :show-text="false"  
          :color="['#ff0000', '#ff0000']"
          >
        </k-progress>
        <k-progress 
          v-if="lawpwd"
          status="success" 
          type="line"
          :percent="40"  
          :show-text="false"        
          :color="['#ff0000', '#ff9100']"
          >
        </k-progress>
        <k-progress 
          v-if="mediumpwd"
          status="success" 
          type="line"
          :percent="60"  
          :show-text="false"     
          :color="['#ff0000','#ff9100','#a2ff00']"
          >
        </k-progress>
        <k-progress 
          v-if="strongpwd"
          status="success" 
          type="line"
          :percent="80"  
          :show-text="false"         
          :color="['#ff0000', '#ff9100','#a2ff00','#0ecc0e']"
          >
        </k-progress>
        <k-progress 
          v-if="verystrongpwd"
          status="success" 
          type="line"
          :percent="100"  
          :show-text="false"         
          :color="['#ff0000', '#ff9100','#a2ff00','#0ecc0e','#0ecc0e']"
          >
        </k-progress>
        <div class="text-center" v-if="verylawpwd" style="color:red">
          Mots de passe très faible
        </div>
        <div class="text-center" v-if="lawpwd" style="color:red">
          Mots de passe faible
        </div>
        <div class="text-center" v-if="mediumpwd" style="color:red">
          Mots de passe moyen
        </div>
        <div class="text-center" v-if="strongpwd" style="color:green">
          Mots de passe fort
        </div>
        <div class="text-center" v-if="verystrongpwd" style="color:green">
          Mots de passe très fort
        </div>
  </div>
</template>

<script src='../js/jaugePwd.js'></script>

<style lang="scss">
  #app .k-progress-outer { 
    padding-right: 0; 
  }
</style>