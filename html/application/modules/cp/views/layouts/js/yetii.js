/*
Yetii - Yetii - Yet (E)Another Tab Interface Implementation
http://www.kminek.pl/lab/yetii/
(c) 2007 Grzegorz Wojcik
It is up to You to leave or remove this copyright notice
*/

function Yetii(obj,active){
    
    this.active = (active) ? active : 1,
    this.timeout = null,
    this.tabclass = 'tab',
    this.activeclass = 'active',
    
    this.getTabs = function(){
        
        var retnode = [];
        var elem = document.getElementById(obj).getElementsByTagName('*');
    
        for (var i = 0; i < elem.length; i++) {
        if ((new RegExp('\\b'+this.tabclass+'\\b')).test(elem[i].className)) retnode.push(elem[i]);
        }
    
        return retnode;
    
    },
        
    this.links = document.getElementById(obj+'-nav').getElementsByTagName('a'),
    this.tabs = this.getTabs();
    
    this.show = function(number){
        
        for (var i = 0; i < this.tabs.length; i++) {
        this.tabs[i].style.display = ((i+1)==number) ? 'block' : 'none';
        this.links[i].className = ((i+1)==number) ? this.activeclass : '';
        }
    
    },
    
    this.rotate = function(interval){
    
        this.show(this.active);
        this.active++;
    
        if(this.active > this.tabs.length) this.active = 1;
    
        var self = this;
        this.timeout = setTimeout(function(){self.rotate(interval);}, interval*1000);
    
    },
    
    this.init = function(interval){
    
        this.show(this.active);
        
        var self = this; 
        for (var i = 0; i < this.links.length; i++) {
        this.links[i].customindex = i+1;
        this.links[i].onclick = function(){ if (self.timeout) clearTimeout(self.timeout); self.show(this.customindex); return false; };
        } 
        
        if (interval) this.rotate(interval);
            
    };

};
