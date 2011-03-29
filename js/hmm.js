		function zeroPad(number,length){var n=number.toString();while(n.length<length){n="0"+n;}return n;}
var barb_size={min:0,max:0};
var village_size={min:0,max:21};
var author="dalesmckay@gmail.com";
var minVer="7.0";
var win=(window.frames.length>0)?window.main:window;
var ver=win.game_data.version.match(/[d|.]+/g);
if(!ver||(parseFloat(ver[1])<minVer)){alert("This script requires v"+minVer+" or higher.\nYou are running: v"+ver[1]);}
else
{
if(win.game_data.screen=="map")
 {var coords=[];alert(TWMap.map.centerPos);
  var col,row,coord,village,player,points;
  for(row=0;row<TWMap.size[1];row++)
  { 
  for(col=0;col<TWMap.size[0];col++)
   {coord=TWMap.map.coordByPixel(TWMap.map.pos[0]+(TWMap.tileSize[0]*col),TWMap.map.pos[1]+(TWMap.tileSize[1]*row));//alert(coord);
     if(coord)
     {
	/* Pomys³ na*/ if(coord[1]<100){ coord[1]="0" + coord[1]; }
     village=TWMap.villages[coord.join("")];
       if(village)
       {player=null; 
         if(parseInt(village.owner||"0",10))
         {player=TWMap.players[village.owner];}
         points=parseInt(village.points.replace(".",""),10);
         if(player)
         {
           if(player.name!=win.game_data.player.name)
           {if((!village_size.min||(points>=village_size.min))&&(!village_size.max||(points<=village_size.max)))
             {coords.push(coord.join("|"));}
           }
         }
         else
         { if((!barb_size.min||(points>=barb_size.min))&&(!barb_size.max||(points<=barb_size.max)))
            { coord[1]=Math.round(coord[1]);  coords.push(coord.join("|")); ;}
         }
       }
     }
   }
  }
alert(coords.join(" "));
 }
 else
 {
 alert("Run this script from the Map.\nRedirecting now...");
 self.location=win.game_data.link_base_pure.replace(/screen=/i,"screen=map");
 }
}
void(0);
