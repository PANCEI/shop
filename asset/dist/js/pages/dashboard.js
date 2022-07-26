var tes =[];
let terpilih=$('.kode').each(function(){
tes.push(this.dataset.kode)
})

  // World map by jvectormap
let map=  $('#vmap').vectorMap({
    map: 'indonesia-adm2-27_merc',
    backgroundColor: 'transparant',
    // onLoad: function(event, map)
    // {
    //  console.log(map);
    // },
    // onLabelShow: function(event, label, code)
    // {
    // },
    // onRegionSelect: function(event, code, region)
    // {

    // },
    // onRegionOut: function(event, code, region)
    // {

    // },
    onRegionClick: function(event, code, region)
    {
       event.preventDefault();
    },
    // onResize: function(event, width, height)
    // {

    // },
    pinMode:'content',
    selectedRegions:tes,
    showTooltip:false,
 color:'black',

   showTooltip:true

     
  
  })


