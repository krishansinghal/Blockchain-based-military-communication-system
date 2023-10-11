// function to initiate contract
  
function initializeContract() {

    if (typeof window.web3 !== 'undefined') 
       {
          window.web3 = new Web3(window.web3.currentProvider);
          window.ethereum.enable();
        } 
       else 
       {
          alert("Please install metamask wallet");
        }
        return new web3.eth.Contract(AttackABI, "0xcd151dd81b34DF57179B95Ff27c50F744a3E9204");

 }

//  function to generate hash of notification data

function generateNHash()
{
      let country = document.getElementById("country").value;
      let weapon = document.getElementById("weapon").value;
      let noweapon = document.getElementById("nweapon").value;
      let velocity = document.getElementById("velocity").value;
      noweapon = Number(noweapon);
      velocity = Number(velocity);
      let data = [noweapon, velocity, country, weapon];
      data = "[" + data + "]";
      let hash = CryptoJS.SHA256(data);
      hash = "0x" + hash;
      return hash;
} 


//  function to send attack data to blockchain by border officer
async function inputNotification(id, hash)
{
   let country = document.getElementById("country").value;
   let weapon = document.getElementById("weapon").value;
   let noweapon = document.getElementById("nweapon").value;
   let velocity = document.getElementById("velocity").value;
   id = parseInt(id);
   noweapon = parseInt(noweapon);
   velocity = parseInt(velocity);
   if(velocity > 255)
   {
      alert('Please enter a value less than 255');
   }

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });
   console.log(accounts[0]);

   AttackContract.methods.notification().call({from: accounts[0]}).then(function(value)
   {
       if(value == false)
       {
            AttackContract.methods.inputAttackData(id,hash,noweapon,velocity,country,weapon).send({from: accounts[0]}).then(function(result)
            {
               if(result.status == true)
               {
                  alert("Notification sent successfully");
               }
               else{
                  alert("An Error occurred!");
               }
            });
       }
       else
       {
          alert('Attack already in process. Please wait until it completes');
       }
   });
}

//  function to add border officer to blockchain by cc officer

async function addBorderOfficer()
{
   var id = document.getElementById("boffid").value;
   var address = document.getElementById("baddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.addBorderOff(id, address).send({from: accounts[0]}).then(function(result)
   {
      console.log(result);
       if(result.status == true)
       {
          alert("Border officer added successfully!");
       }
       else{
         alert("An Error occurred!");
       }
   });

}

//  function to add cc officer to blockchain by cc officer

async function addCCOfficer()
{
   var id = document.getElementById("coffid").value;
   var address = document.getElementById("caddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.addCCOff(id, address).send({from: accounts[0]}).then(function(result)
   {
      console.log(result);
       if(result.status == true)
       {
          alert("CC officer added successfully!");
       }
       else{
         alert("An Error Occurred!");
       }
   });

}

//  function to add response officer to blockchain by cc officer

async function addResponseOfficer()
{
   var id = document.getElementById("resoffid").value;
   var address = document.getElementById("resaddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.addResponseOff(id, address).send({from: accounts[0]}).then(function(result)
   {
       console.log(result);
       if(result.status == true)
       {
          alert("Response officer added successfully!");
       }
       else{
         alert("An Error occurred!");
       }
   });

}

//  function to update border officer to blockchain by cc officer

async function updateBorderOfficer()
{
   var id = document.getElementById("boffid").value;
   var address = document.getElementById("baddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.updateBorderOff(id, address).send({from: accounts[0]}).then(function(result)
   {
       if(result.status == true)
       {
          alert("Border officer updated successfully!");
       }
       else{
         alert("An Error occurred!");
       }
   });

}

//  function to update CC officer to blockchain by cc officer

async function updateCCOfficer()
{
   var id = document.getElementById("coffid").value;
   var address = document.getElementById("caddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.updateCCOff(id, address).send({from: accounts[0]}).then(function(result)
   {
       if(result.status == true)
       {
          alert("CC officer updated successfully!");
       }
       else{
         alert("An Error occurred!");
       }
   });

}

//  function to update response officer to blockchain by cc officer

async function updateResponseOfficer()
{
   var id = document.getElementById("resoffid").value;
   var address = document.getElementById("resaddress").value;

   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.updateResponseOff(id, address).send({from: accounts[0]}).then(function(result)
   {
       if(result == true)
       {
          alert("Response officer added successfully!");
       }
       else{
         alert("Error adding response officer!");
       }
   });

}

// attack notification popup function
async function attackNotifPopup()
{
    var modal = document.getElementById("id01");
    var main = document.getElementById("main");
    var closeSpan = document.getElementById("closeSpan");
    var AttackContract = initializeContract();
    accounts = await ethereum.request({ method: 'eth_requestAccounts' });

    AttackContract.methods.notification().call({from: accounts[0]}).then(function(result)
    {
      console.log(result);
       if(result == true)
       {
         console.log(result);
         AttackContract.methods.dataCount().call({from: accounts[0]}).then(function(count)
         {
             if(count>=0)
             {
                AttackContract.methods.dataHashArray(count).call({from: accounts[0]}).then(function(result)
                {
                     if(result)
                     {
                        var hashData = result;
                        AttackContract.methods.receiveData(hashData).call({from: accounts[0]}).then(function(result)
                           {
                              if(result)
                              {
                                 console.log("receive data = " + result);
                                 document.getElementById("country").value = result[2];
                                 document.getElementById("weapon").value = result[3];
                                 document.getElementById("nweapon").value = result[0];
                                 document.getElementById("velocity").value = result[1];
                                 modal.style.display = "block";
                                 main.style.backgroundColor = "grey";
                                 closeSpan.style.display = "none";
                                 
                              }
                              else
                              {
                                 alert("Something Wrong!");
                              }
                           });

                     }
                     else
                     {
                        alert('No hash data found');
                     }
                });
             }
             else
             {
                  alert("No Data found");
             }
         });
       
       }
       else
       {
         alert("An error occurred! Please Retry");
       }
   });

}

// function to verify attack data by cc officer
async function verifyAttackNotif(id)
{
   const hash = generateNHash();
   var closeSpan = document.getElementById("closeSpan");
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });
   
   AttackContract.methods.verifyData(id, hash).call({from: accounts[0]}).then(function(result)
   {
       if(result == true)
       {
          alert("Data Verified Successfully!");
          closeSpan.style.display = 'block';
       }
       else{
         alert("Data not Verified!");
       }
   });

}

// generate hash for weapons data

function genWeaponHash(wName, numWeapon)
{
      numWeapon = Number(numWeapon);
      let data = [numWeapon, wName];
      data = "[" + data + "]";
      console.log(data);
      let hash = CryptoJS.SHA256(data);
      hash = "0x" + hash;
      console.log(hash);
      return hash;
} 


// input weapon data in blockchain by cc officer

async function triggerWeaponData(id, wid)
{
   var subid = wid[1];
   console.log(subid);
   var weaponName = document.getElementById('wname'+ subid).innerHTML;
   var numWeapon = document.getElementById('nw'+ subid).value;
   console.log(weaponName);
   console.log(numWeapon);
   let whash = genWeaponHash(weaponName, numWeapon);
   console.log(whash);
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });
   
   AttackContract.methods.attackEnable().call({from: accounts[0]}).then(function(value)
   {
      if(value == false)
      {
         AttackContract.methods.inputWeaponData(id, whash, numWeapon, weaponName).send({from: accounts[0]}).then(function(result)
         {
             if(result.status == true)
             {
                alert("Weapons Trigger Notification sent");
             }
             else{
               alert("Error triggering weapon");
             }
         });
      }
      else
      {
         alert('Attack already in process. Please wait until it completes!');
      }
   });
   
}

// weapon notification popup function
async function weaponNotifPopup()
{
    var modal = document.getElementById("id01");
    var main = document.getElementById("main");
    var closeSpan = document.getElementById("closeSpan");
    var AttackContract = initializeContract();
    accounts = await ethereum.request({ method: 'eth_requestAccounts' });

    AttackContract.methods.attackEnable().call({from: accounts[0]}).then(function(result)
    {
       if(result == true)
       {
         console.log("attack Enable value = " + result);
         AttackContract.methods.weaponCount().call({from: accounts[0]}).then(function(count)
         {
             if(count>=0)
             {
                AttackContract.methods.weaponHashArray(count).call({from: accounts[0]}).then(function(result)
                {
                     if(result)
                     {
                        var hashData = result;
                        AttackContract.methods.weaponData(hashData).call({from: accounts[0]}).then(function(result)
                           {
                              if(result)
                              {
                                 console.log("receive data = " + result);
                                 document.getElementById("weapon").value = result[1];
                                 document.getElementById("nweapon").value = result[0];
                                 modal.style.display = "block";
                                 main.style.backgroundColor = "grey";
                                 closeSpan.style.display = "none";
                              }
                              else
                              {
                                 alert("Error Retrieving Weapon Data");
                              }
                           });

                     }
                     else
                     {
                        alert("Error retrieving current weapon hash");
                     }
               });       
            }
             else
            {
               alert("No data present");
            }
       });
      }
      else
      {
         alert('Attack not yet enabled');
      }
   });

}

// function to verify weapon data by response officer
async function verifyWeaponNotif(id, button)
{
   var weaponName = document.getElementById("weapon").value;
   var numWeapon = document.getElementById("nweapon").value;
   const hash = genWeaponHash(weaponName, numWeapon);
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });
   
   AttackContract.methods.verifyWeapons(id, hash).call({from: accounts[0]}).then(function(result)
   {
       if(result == true)
       {
          button.disabled = false;
          alert("Weapons Verified Successfully!");
       }
       else{
         alert("Error Verifying Weapons Data");
       }
   });

}

// function to launch weapons by response officer
async function launchWeapon(id)
{
   var weaponName = document.getElementById("weapon").value;
   var numWeapon = document.getElementById("nweapon").value;
   var weapname = document.getElementById("weaponname");
   var weapnum = document.getElementById("weaponnum"); 
   var closeSpan = document.getElementById("closeSpan");
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.weaponTrigger().call({from: accounts[0]}).then(function(value)
   {
      if(value == false)
      {
         AttackContract.methods.triggerWeapon(id).send({from: accounts[0]}).then(function(result)
         {
             if(result.status == true)
             {
                alert("Weapons Launched!");
                weapname.innerHTML = "Weapon Name: " + weaponName;
                weapnum.innerHTML = "Weapon Quantity: " + numWeapon;
                closeSpan.style.display = 'block';
             }
             else{
               alert("Error launching weapons");
             }
         });
      }
      else
      {
         alert('Weapons already Triggered!');
      }
   });
   
}

// function to view current attack Data by CC Officer
async function viewCurrntData(id){
   let tbbody = document.getElementById('tableBody');
   let rowCount = tbbody.rows.length;
   console.log('Current Data '+rowCount);
   if(rowCount > 0)
   {
      for(let i=0; i<rowCount; i++)
      {
         tbbody.deleteRow(i);
      }
   }
   let sno = 0;
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.notification().call({from: accounts[0]}).then(function(result){
        if(result == false)
        {
           console.log('Result: ' + result);
         AttackContract.methods.dataCount().call({from: accounts[0]}).then(function(count)
         {
            if(count>0)
            {
               console.log(count);
               let row = tbbody.insertRow(-1);
               AttackContract.methods.viewCurData(id).call({from: accounts[0]}).then(function(data)
               {
                    console.log('Return'+ data);
                     if(data[0] > 0)
                     {
                        sno++;
                        
                        let c1 = row.insertCell(0);
                        let c2 = row.insertCell(1);

                        c1.innerHTML = sno;
                        c2.innerHTML = 'Attack Country: ' + data[2] + '</br>' +
                                       'Attack Weapon: ' + data[3] + '</br>' +
                                       'No. of weapons: ' + data[0] + '</br>' +
                                       'Weapon Velocity: ' + data[1] + '</br>';
                     }
                     else
                     {
                        alert('Error retrieving attack data. Please try again');
                     }
               });

               AttackContract.methods.viewCurWeaponData(id).call({from: accounts[0]}).then(function(data)
               {
                     if(data[0] > 0)
                     {
                        let c3 = row.insertCell(2);
                        c3.innerHTML = 'Weapon Name: ' + data[1] + '</br>' +
                                       'Weapon Quantity: ' + data[0] + '</br>';
                     }
                     else
                     {
                        alert('Error retrieving Weapon Data. Please try again');
                     }
               });
            }
            else
            {
               alert('No data Present');
            }
         });
        }
        else
        {
         alert('Attack under process. You cannot access current data!');
        }
   });
   
}

// function to view All attack Data by CC officer
async function viewAll(id)
{
   let tbbody = document.getElementById('tableBody');
   let rowCount = tbbody.rows.length;
   console.log('Current Data '+rowCount);
   if(rowCount > 0)
   {
      for(let i=0; i<rowCount; i++)
      {
         tbbody.deleteRow(i);
      }
   }
   let serno = 1;
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.notification().call({from: accounts[0]}).then(function(result){
      if(result == false)
      {
         AttackContract.methods.viewAllData(id).call({from: accounts[0]}).then(function(result)
         {
            console.log('hash array'+ result);
            if(result.length > 0)
            {
               for(let i=0; i<result.length; i++)
               {
                  AttackContract.methods.receiveData(result[i]).call({from: accounts[0]}).then(function(data)
                  {
                     console.log('data' + data);
                     if(data[0] > 0)
                     {
                           let row = tbbody.insertRow(-1);
                           let c1 = row.insertCell(0);
                           let c2 = row.insertCell(1);
                           c1.innerHTML =  serno;
                           c2.innerHTML = 'Attack Country: ' + data[2] + '</br>' +
                                          'Attack Weapon: ' + data[3] + '</br>' +
                                          'No. of weapons: ' + data[0] + '</br>' +
                                          'Weapon Velocity: ' + data[1] + '</br>';
                           serno++;
                     }
                     else
                     {
                        alert('Error retrieving data');
                     }
                  });             
               }
               
            }
            else
            {
               alert('No Data Present');
            }
         });
      }
      else
      {
         alert('Attack in process. Please Wait!');
      }
   });
   viewWData(id);
}

//  function to view all weapon data by cc officer
async function viewWData(id)
{
   let tbbody = document.getElementById('tableBody');
   let rowCount = tbbody.rows.length;
   console.log('Row Count '+rowCount);
   var AttackContract = initializeContract();
   accounts = await ethereum.request({ method: 'eth_requestAccounts' });

   AttackContract.methods.viewAllWeaponData(id).call({from: accounts[0]}).then(function(result)
   {
       console.log('weapon hash array'+ result);
       if(result.length > 0)
       {
          for(let i=0; i<result.length; i++)
          {
             AttackContract.methods.weaponData(result[i]).call({from: accounts[0]}).then(function(data)
             {
                 console.log('weapon data' + data[0]);
                 if(data[0] > 0)
                 {
                        let rowdata = tbbody.rows[i];
                        console.log(rowdata);
                        let c3 = rowdata.insertCell(2);
                        c3.innerHTML = 'Weapon Name: ' + data[1] + '</br>' +
                                       'Weapon Quantity: ' + data[0] + '</br>';
                 }
                 else
                 {
                    alert('Error retrieving weapon data');
                 }
             });             
          }
       }
       else
       {
         alert('No Data Present');
       }
   });
}