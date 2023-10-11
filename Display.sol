// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.0;
import './Attack.sol';

contract Display is Attack{

    // function to view current attack data
    function viewCurData(uint8 id) public view returns(uint8,uint8,string memory,string memory)
    {
        require(ccOfficers[id] == msg.sender, "Incorrect User");
        bytes32 curDHash= dataHashArray[dataCount];
        return (receiveData[curDHash].numWeapon, receiveData[curDHash].velocity, receiveData[curDHash].attackCountry, receiveData[curDHash].attackWeapon );
    }

    // function to view current weapon data
    function viewCurWeaponData(uint8 id) public view returns(uint8, string memory)
    {
        require(ccOfficers[id] == msg.sender, "Incorrect User");
        bytes32 curWHash= weaponHashArray[weaponCount];
        return (weaponData[curWHash].quantity, weaponData[curWHash].weaponName);
    }

    // function to view all attack data
    function viewAllData(uint8 id) public view returns(bytes32[] memory)
    {
        require(ccOfficers[id] == msg.sender, "Incorrect User");
        return dataHashArray;
    }

    // function to view all weapon data
    function viewAllWeaponData(uint8 id) public view returns(bytes32[] memory)
    {
        require(ccOfficers[id] == msg.sender, "Incorrect User");
        return weaponHashArray;
    }
}