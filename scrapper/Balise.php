<?php

namespace labonnealerte\scrapper;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Balise
{
  const date = "//aside[@class='item_absolute']/p"; 
  const title = "//section[@class='item_infos']/h2[@class='item_title']";
  const url = "//li[@itemtype='http://schema.org/Offer']/a/@href";
}
