// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.0;
import './Ownable.sol';
import './Officer.sol';

contract Attack is Officer{
    // struct for receiving details about the attack (done by border officer)
    struct AttackData{
       uint8 numWeapon;
       uint8 velocity;  
       string attackCountry;
       string attackWeapon;
       bytes32 hashValue;
    }

    // struct to receive weapon details(done by cc officer)
    struct Weapons{
      uint8 quantity;
      string weaponName;
      bytes32 whashValue;
    }

    // mapping for data hash and input data
    mapping(bytes32 => AttackData) public receiveData;
    // mapping for data hash and weapon data
    mapping(bytes32 => Weapons) public weaponData;
    // array to store dataHash
    bytes32[] public dataHashArray;
    // array to store weaponHash
    bytes32[] public weaponHashArray;
    // var for current count of data
    uint public dataCount = 0;
    // var for current count of data
    uint public weaponCount = 0; 
    // var to depict that notification has been sent/new notification has been uploaded
    bool public notification = false; 
    // var to depict enable and disable attack(by response team)
    bool public attackEnable = false;
    // var to depict if weapons are triggered(by cc officer)
    bool public weaponTrigger = false;

    // function to receive input data and hash invoked by border officer
    function inputAttackData(uint8 id, bytes32 dataHash, uint8 num, uint8 vel, string memory country, string memory weapon) public returns(bool)
    {
         require(borderOfficers[id] == msg.sender,"Incorrect user");
         receiveData[dataHash] = AttackData(num, vel, country, weapon, dataHash);
         dataHashArray.push(dataHash);
         weaponTrigger = false;
         notification = true;
         return true;
    }
    
    // function to verify the input data for cc officer
    function verifyData(uint8 id, bytes32 d_hash) public view returns(bool)
    {
        require(ccOfficers[id] == msg.sender,"Incorrect user");
        require(receiveData[d_hash].hashValue == d_hash ,"Incorrect Hash Value");
        return true;
    }

    // function to receive weapon data and hash invoked by cc officer
    function inputWeaponData(uint8 id, bytes32 weaponHash, uint8 quant, string memory wname) public returns(bool)
    {
         require(ccOfficers[id] == msg.sender,"Incorrect user");
         weaponData[weaponHash] = Weapons(quant, wname, weaponHash);
         weaponHashArray.push(weaponHash);
         attackEnable = true;
         return true;
    }

    // function to verify the weapon data for response team
    function verifyWeapons(uint8 id, bytes32 w_hash) public view returns(bool)
    {
        require(responseTeam[id] == msg.sender,"Incorrect user");
        require(weaponData[w_hash].whashValue == w_hash, "Incorrect Hash");
        return true;
    }

    // function to trigger weapons by response team
    function triggerWeapon(uint8 id) public returns(bool)
    {
        require(responseTeam[id] == msg.sender,"Invalid User");
        require(weaponTrigger == false, "Weapon Already Triggered");
        weaponTrigger = true;
        attackEnable = false;
        notification = false;
        dataCount++;
        weaponCount++;
        return true;
    }
   
}

