export default {
    name: 'JaugePwd',
    props: ['password'],
    data(){
      return{
        verylawpwd: false,
        lawpwd: false,
        mediumpwd: false,
        strongpwd: false,
        verystrongpwd: false
      }
    },
    watch: {
      password: function(val){
        const paternVeryStrongpwd =  /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternStrongpwd1 = /(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternStrongpwd2 = /(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternStrongpwd3 = /(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternStrongpwd4 = /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[a-z]).*$/
        const paternStrongpwd5 = /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z]).*$/
        const paternMediumpwd1 =  /(?=^.{4,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternMediumpwd2 = /(?=^.{6,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternMediumpwd3 = /(?=^.{6,}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternMediumpwd4 = /(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[a-z]).*$/
        const paternMediumpwd5 = /(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z]).*$/
        const paternMediumpwd6 =  /(?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternMediumpwd7 =  /(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[a-z]).*$/
        const paternMediumpwd8 =  /(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z]).*$/
        const paternMediumpwd9 =  /(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[a-z]).*$/
        const paternMediumpwd10 =  /(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[A-Z]).*$/
        const paternMediumpwd11 =  /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n]).*$/
        const paternLawpwd1 = /(?=^.{4,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternLawpwd2 = /(?=^.{4,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternLawpwd3 = /(?=^.{4,}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternLawpwd4 = /(?=^.{4,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[a-z]).*$/
        const paternLawpwd5 = /(?=^.{4,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z]).*$/
        const paternLawpwd6 =  /(?=^.{6,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        const paternLawpwd7 =  /(?=^.{6,}$)(?=.*\W+)(?![.\n])(?=.*[a-z]).*$/
        const paternLawpwd8 =  /(?=^.{6,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z]).*$/
        const paternLawpwd9 =  /(?=^.{6,}$)(?=.*\d)(?![.\n])(?=.*[a-z]).*$/
        const paternLawpwd10 =  /(?=^.{6,}$)(?=.*\d)(?![.\n])(?=.*[A-Z]).*$/
        const paternLawpwd11 =  /(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n]).*$/
        const paternVerylawpwd =  /(?=^.{1,}$)((?=.*\d)|(?=.*\W+)|(?![.\n])|(?=.*[A-Z])|(?=.*[a-z])).*$/

        if(val.match(paternVeryStrongpwd)) {
          this.verylawpwd = false
          this.lawpwd = false
          this.mediumpwd = false
          this.strongpwd = false
          this.verystrongpwd = true  
        }else if(
                val.match(paternStrongpwd1) 
                || val.match(paternStrongpwd2) 
                || val.match(paternStrongpwd3) 
                || val.match(paternStrongpwd4) 
                || val.match(paternStrongpwd5)
              ){
          this.verylawpwd = false
          this.lawpwd = false
          this.mediumpwd = false
          this.strongpwd = true
          this.verystrongpwd = false  
        }else if(
                val.match(paternMediumpwd1) 
                || val.match(paternMediumpwd2) 
                || val.match(paternMediumpwd3) 
                || val.match(paternMediumpwd4) 
                || val.match(paternMediumpwd5)
                || val.match(paternMediumpwd6) 
                || val.match(paternMediumpwd7)
                || val.match(paternMediumpwd8) 
                || val.match(paternMediumpwd9)
                || val.match(paternMediumpwd10) 
                || val.match(paternMediumpwd11)
              ){
          this.verylawpwd = false
          this.lawpwd = false
          this.mediumpwd = true
          this.strongpwd = false
          this.verystrongpwd = false  
        }else if(
                val.match(paternLawpwd1) 
                || val.match(paternLawpwd2) 
                || val.match(paternLawpwd3) 
                || val.match(paternLawpwd4) 
                || val.match(paternLawpwd5)
                || val.match(paternLawpwd6) 
                || val.match(paternLawpwd7)
                || val.match(paternLawpwd8) 
                || val.match(paternLawpwd9)
                || val.match(paternLawpwd10) 
                || val.match(paternLawpwd11)
              ){
          this.verylawpwd = false
          this.lawpwd = true
          this.mediumpwd = false
          this.strongpwd = false
          this.verystrongpwd = false  
        }else if(val.match(paternVerylawpwd)) {
          this.verylawpwd = true
          this.lawpwd = false
          this.mediumpwd = false
          this.strongpwd = false
          this.verystrongpwd = false  
        }else {
          this.verylawpwd = false
          this.lawpwd = false
          this.mediumpwd = false
          this.strongpwd = false
          this.verystrongpwd = false  
        }
       
        
      }
    }
  };