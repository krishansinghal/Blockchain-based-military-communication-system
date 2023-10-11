// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.0;
import './Ownable.sol';

contract Officer is Ownable{
    uint8 public bofficer=0;
    uint8 public ccofficer=0;
    uint8 public response=0;
    // mapping for addresses of border officers
    mapping(uint8 => address) public borderOfficers;
    // mapping for addresses of cc officers
    mapping(uint8 => address) public ccOfficers;
    // mapping for addresses of response team
    mapping(uint8 => address) public responseTeam;

    // done only by the owner of contract needs modifier
    // function to add and update user in border officer
    function addBorderOff(uint8 id, address b_address) public onlyOwner returns(bool)
    {
        require(id >= bofficer, "Please enter valid ID");
        for(uint8 i=0;i<bofficer;i++)
        {
           if(borderOfficers[i] == b_address)
           {
               return false;
           } 
        }
        borderOfficers[id] = b_address;
        bofficer++;
        return true;       
    }

    function updateBorderOff(uint8 id, address upd_baddress) public onlyOwner returns(bool)
    {
        require(id <= bofficer,"Id should be less than current length");
        borderOfficers[id] = upd_baddress;
        return true;
    }

    // function to add and update user in cc officer
    function addCCOff(uint8 id, address b_address) public onlyOwner returns(bool)
    {
        require(id >= ccofficer, "Please enter valid ID");
        for(uint8 i=0;i<ccofficer;i++)
        {
           if(ccOfficers[i] == b_address)
           {
               return false;
           } 
        }
        ccOfficers[id] = b_address;
        ccofficer++; 
        return true;       
    }

    function updateCCOff(uint8 id, address upd_ccaddress) public onlyOwner returns(bool)
    {
        require(id <= ccofficer,"Id should be less than current length");
        ccOfficers[id] = upd_ccaddress;
        return true;
    }

    // function to add and update user in response team
    function addResponseOff(uint8 id, address b_address) public onlyOwner returns(bool)
    {
        require(id >= response, "Please enter valid ID");
        for(uint8 i=0;i<response;i++)
        {
           if(responseTeam[i] == b_address)
           {
               return false;
           } 
        }
        responseTeam[id] = b_address;
        response++;
        return true;       
    }

    function updateResponseOff(uint8 id, address upd_resaddress) public onlyOwner returns(bool)
    {
        require(id <= response,"Id should be less than current length");
        responseTeam[id] = upd_resaddress;
        return true;
    }

}