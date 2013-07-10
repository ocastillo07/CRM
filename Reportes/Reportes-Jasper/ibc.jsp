<%@ page import="java.sql.*" %>
<%@ page import="net.sf.jasperreports.engine.*" %>
<%@ page import="net.sf.jasperreports.engine.util.*" %>
<%@ page import="net.sf.jasperreports.engine.export.*" %>
<%@ page import="net.sf.jasperreports.j2ee.servlets.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.io.*" %>
<%@ page import="java.util.HashMap" %>
<%@ page import="java.util.Map" %>


<%

Connection connection = null; 

try
{	
	try
	{
		Class.forName("com.mysql.jdbc.Driver").newInstance(); 
		connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/ibc", "root", "freedom"); 
	}
	catch(Exception ex) {
         		ex.printStackTrace();
      	}
		
	String reportname = request.getParameter("reporte");
	
	String mod = "";	
	if( "ref".equalsIgnoreCase(request.getParameter("mod")) )	
		mod = "refacciones/";
	else
		if( "ser".equalsIgnoreCase(request.getParameter("mod")) )	
			mod = "servicios/";
	else
		if("cxc".equalsIgnoreCase(request.getParameter("mod")) )	
			mod = "CXC/";
	else
	   if("crm".equalsIgnoreCase(request.getParameter("mod")) )	
			mod = "crm/";
	else
		mod = "";
    	
	
	File reportFile = new File(application.getRealPath(mod+reportname+".jasper"));
	
	JasperReport jasperReport = (JasperReport)JRLoader.loadObject(reportFile.getPath());
	
	Map pars = new HashMap();
	
	
    
	/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				GENERAL
	*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
	if( "logusuarios".equalsIgnoreCase(reportname) )
	{
		pars.put("pidusuario", request.getParameter("idusuario"));
		pars.put("pf1", request.getParameter("f1"));
		pars.put("pf2", request.getParameter("f2"));
	}
	
	if( "actividades".equalsIgnoreCase(reportname) )
	{
		pars.put("idvendedor", request.getParameter("idvendedor"));
		pars.put("fecha1", request.getParameter("fecha1"));
		pars.put("fecha2", request.getParameter("fecha2"));
	}
	
	if( "usuariosderechos".equalsIgnoreCase(reportname) )
	{
	    String cad = " where u.idusuario="+request.getParameter("idusuario")+" ";
		pars.put("pcondicion", cad);
	}
	
	/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				CRM
	*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if( "ofertas".equalsIgnoreCase(reportname) )
	{
		int idoferta = Integer.parseInt(request.getParameter("idoferta"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		
		pars.put("idoferta", idoferta);
		pars.put("idrevision", idrevision);		
	}
	
	if( "pedidofactura".equalsIgnoreCase(reportname) )
	{
		int idoferta = Integer.parseInt(request.getParameter("idoferta"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		pars.put("idoferta", idoferta);
		pars.put("idrevision",idrevision);		
	}
	
	/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				REFACCIONES
	*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if( "partes".equalsIgnoreCase(reportname) )
	{
		String cad = "where pm.idalmacen='"+request.getParameter("idalmacen")+"' and pm.cveparte='"+request.getParameter("cveparte")+"'";
		pars.put("pcondicion",cad);
		pars.put("pathimg",request.getParameter("path"));
	}
	
	
	if( "presupuesto".equalsIgnoreCase(reportname) )
	{
		int idventa = Integer.parseInt(request.getParameter("idventa"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		int partes= Integer.parseInt(request.getParameter("partes"));
		String serie= "'"+request.getParameter("serie")+"'";
		pars.put("idventa",idventa);
		pars.put("idrevision",idrevision);		
		pars.put("serie",serie);
		pars.put("partes",partes);
	}
	
	if( "prefactura".equalsIgnoreCase(reportname) )
	{
		int idventa = Integer.parseInt(request.getParameter("idventa"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		String serie= "'"+request.getParameter("serie")+"'";
		pars.put("idventa",idventa);
		pars.put("idrevision",idrevision);		
		pars.put("serie",serie);
	}
	
	if( "factura".equalsIgnoreCase(reportname) )
	{
		int idventa = Integer.parseInt(request.getParameter("idventa"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		String serie= "'"+request.getParameter("serie")+"'";
		pars.put("idventa",idventa);
		pars.put("idrevision",idrevision);		
		pars.put("serie",serie);
	}

	if( "ordencompra".equalsIgnoreCase(reportname) )
	{
		String cad = " where o.serie = '"+request.getParameter("serie")+"' and o.idorden = '"+request.getParameter("idorden")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "compras".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("idcompra")!=null)
		cad = " where c.serie = '"+request.getParameter("serie")+"' and c.idcompra = '"+request.getParameter("idcompra")+"' ";
	else
	{
	
	if (request.getParameter("f1")!=null)
		 cad = " where c.fechacreacion between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and c.idproveedor = "+request.getParameter("idproveedor");
	}	

		
		pars.put("pcondicion", cad);
	}
	
	if( "devcompras".equalsIgnoreCase(reportname) )
	{
		String cad = " where d.serie = '"+request.getParameter("serie")+"' and d.iddevolucion = '"+request.getParameter("iddevolucion")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "ajusteinv".equalsIgnoreCase(reportname) )
	{
		String cad = " where a.serie = '"+request.getParameter("serie")+"' and a.idajuste = '"+request.getParameter("idajuste")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "ajusteinvcores".equalsIgnoreCase(reportname) )
	{
		String cad = " where dp.serie = '"+request.getParameter("serie")+"' and dp.idajuste = '"+request.getParameter("idajuste")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "redevcores".equalsIgnoreCase(reportname) )
	{
		String cad = " where dp.serie = '"+request.getParameter("serie")+"' and dp.iddevolucion = '"+request.getParameter("iddevolucion")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "traspasos".equalsIgnoreCase(reportname) )
	{
		String cad = " where t.serie = '"+request.getParameter("serie")+"' and t.idtraspaso = '"+request.getParameter("idtraspaso")+"' ";
		pars.put("pcondicion", cad);
	}
	
	if( "requisicion".equalsIgnoreCase(reportname) )
	{
		String cad = " where r.serie = '"+request.getParameter("serie")+"' and r.idrequisicion = '"+request.getParameter("idrequisicion")+"' ";
		pars.put("pcondicion", cad);
	}
	
	
	if( "librocompras".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = "  where c.fechacreacion between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and c.idproveedor = "+request.getParameter("idproveedor");
		
	if(!("0".equalsIgnoreCase(request.getParameter("tipo"))))
		cad = cad + " having tipo = '"+request.getParameter("tipo")+"' ";	
		
		String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
	}
	
	if( "librocomprasres".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " and c.fechacreacion between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and c.idproveedor = "+request.getParameter("idproveedor");
		
	if(!("0".equalsIgnoreCase(request.getParameter("tipo"))))
		cad = cad + " having tipo = '"+request.getParameter("tipo")+"' ";	
		
		String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
	}

    if( "comprastotales".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " where c.fechacreacion between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and c.idproveedor = "+request.getParameter("idproveedor");
		
		String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
	}
	
	if( "repdevcomp".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " where dc.fechacreacion between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and dc.idproveedor = "+request.getParameter("idproveedor");
		
		String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
	}
	
	if( "recorevencimientos".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " where cv.fechavencimiento between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";

	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
	   if(!("0".equalsIgnoreCase(request.getParameter("idalmacen"))))
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("0".equalsIgnoreCase(request.getParameter("idproveedor"))))
		cad = cad + " and c.idproveedor = "+request.getParameter("idproveedor");
		
		String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
	}
	
	if( "cambioprecios".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " where c.fecha between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"'";
		 
	if (request.getParameter("cveparte")!=null)
		 cad = cad+" and c.cveparte = '"+request.getParameter("cveparte")+"'";
	
	String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	 
	}
	
	if( "reabastecimiento".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	String cad2 = "";
	String cad3 = "";
	
	if (request.getParameter("meses")!=null)
		 cad = " where periodo between ( Select cveperiodo from periodos where date_sub(curdate(), interval "+request.getParameter("meses")+" month)  "+
		 		"between fecha1 and fecha2 ) and  ( Select cveperiodo from periodos where curdate() between fecha1 and fecha2 )   ";
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " and t.idalmacen = "+request.getParameter("idalmacen");
		
	if(!("TODOS".equalsIgnoreCase(request.getParameter("idlinea"))))
		{
		cad2 = " where p.idlinea = "+request.getParameter("idlinea");
		if(!("0".equalsIgnoreCase(request.getParameter("idestatus"))))
			cad2 = cad2+" and pm.idestatus = "+request.getParameter("idestatus");
		}
	else
		if(!("0".equalsIgnoreCase(request.getParameter("idestatus"))))
			cad2 = " where pm.idestatus = "+request.getParameter("idestatus");
		
	if (request.getParameter("sinpropuestas")!=null)
		cad3 = " having asurtir > 0 ";
		
		String per = "concat('De ', date_sub(curdate(), interval "+request.getParameter("meses")+" month), ' a ', curdate()) ";
		pars.put("pcondicion", cad);
		pars.put("pcondicion2", cad2);
		pars.put("pcondicion3", cad3);
		pars.put("periodo", per);
		pars.put("meses", request.getParameter("meses"));
	
	}
	
	if("reclasificacion".equalsIgnoreCase(reportname))
	{
		String cad = "";
		if(request.getParameter("idalmacen")!=null)
			cad = " where ce.idalmacen=" + request.getParameter("idalmacen");	
		pars.put("pcondicion", cad);
		pars.put("pnombrerep", request.getParameter("nombrerep"));
	}
	
	if( "kardexparte".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		 cad = " where k.fecha between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"' and k.idalmacen="+
		 		 request.getParameter("idalmacen")+"";
		 
	if (request.getParameter("cveparte")!=null)
		 cad = cad+" and k.cveparte = '"+request.getParameter("cveparte")+"'";
	
	String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
		pars.put("periodosis", request.getParameter("periodosis"));	 
		pars.put("porden", request.getParameter("porden"));	 
	}
	
	if( "repkardexres".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		  cad = " where k.fecha between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"' and k.idalmacen="+
		 		 request.getParameter("idalmacen")+"";
	
	String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	}
	
	if( "repkardexremi".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		  cad = " where k.fecha between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"' and k.idalmacen="+
		 		 request.getParameter("idalmacen")+"";
				 
	if (request.getParameter("idmovimiento")!=null)
		{
		if("0".equalsIgnoreCase(request.getParameter("idmovimiento")))
			cad = cad + "";
		else
			{
			if("E".equalsIgnoreCase(request.getParameter("idmovimiento")))
				cad = cad + " and k.movimiento = 'E'";
			else				
				if("S".equalsIgnoreCase(request.getParameter("idmovimiento")))
					cad = cad + " and k.movimiento = 'S'";
				else
					cad = cad + " and k.idmovimiento = "+request.getParameter("idmovimiento");
			}
		}
				 
	if (request.getParameter("afectainv")!=null)
		cad = cad + " and km.afectainventario = 1";
	
	String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	}
	
	if( "kardextipomov".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	if (request.getParameter("f1")!=null)
		  cad = " where k.fecha between '"+request.getParameter("f1")+"' and  '"+ request.getParameter("f2")+"' and k.idalmacen="+
		 		 request.getParameter("idalmacen")+"";
				 
	if (request.getParameter("idmovimiento")!=null)
		{
		if("0".equalsIgnoreCase(request.getParameter("idmovimiento")))
			cad = cad + "";
		else
			{
			if("E".equalsIgnoreCase(request.getParameter("idmovimiento")))
				cad = cad + " and k.movimiento = 'E'";
			else				
				if("S".equalsIgnoreCase(request.getParameter("idmovimiento")))
					cad = cad + " and k.movimiento = 'S'";
				else
					cad = cad + " and k.idmovimiento = "+request.getParameter("idmovimiento");
					
			}
		}
		
	if (request.getParameter("afectainv")!=null)
		cad = cad + " and km.afectainventario = 1";
	
	String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	}
	
	if(  "invciclicodif".equalsIgnoreCase(reportname) || "invciclicodifcore".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	
	cad = " where c.idalmacen="+request.getParameter("idalmacen")+" ";
	
	if (request.getParameter("pasillo")!=null)
	{
		if(request.getParameter("pasillo").equalsIgnoreCase("TODOS"))
			cad = " where c.idalmacen="+request.getParameter("idalmacen")+" ";	
		else
			cad = cad + "and c.pasillo='"+request.getParameter("pasillo")+"' ";
	}		
		
	if (request.getParameter("ubicacion")!=null)
		cad = cad + "and c.ubicacion='"+request.getParameter("ubicacion")+"' ";
			
	if (request.getParameter("marca")!=null)
		cad = cad + "and p.idmarca='"+request.getParameter("marca")+"' ";
	
	//out.print("pcondicion "+request.getParameter("marca"));
		pars.put("pcondicion", cad);
		pars.put("periodo", request.getParameter("periodo"));	
	}
	
	if(  "kits".equalsIgnoreCase(reportname))
	{
	String cad = "";
    cad = " and pm.idalmacen="+request.getParameter("idalmacen")+" and p.cveparte='"+request.getParameter("cveparte")+"'";
	
		pars.put("pcondicion", cad);
		pars.put("periodo", request.getParameter("periodo"));	
	}
	
	if(  "documentospend".equalsIgnoreCase(reportname))
	{
		pars.put("pcondicion", request.getParameter("idalmacen"));
	}
	
	if("analitico".equalsIgnoreCase(reportname))
	{
	  String campo = "",condicion="", ordenado="";
	  String nomrep = "";
	  String f1= "";
	  String f2= "";
	  String plazas= "";
	  campo = request.getParameter("campo");
	  ordenado = request.getParameter("ordenado");
	  nomrep = request.getParameter("nombrerep");
	  plazas = request.getParameter("plazas");
	  if(request.getParameter("f1")!=null)
	  {
	    f1 = request.getParameter("f1");
	    f2 = request.getParameter("f2");
	  }
	  if(request.getParameter("condicion")!=null)
		condicion = "where "+request.getParameter("condicion");
	  pars.put("campo", campo);
	  pars.put("ordenado", ordenado);
	  pars.put("pcondicion", condicion);
	  pars.put("nombrerep", nomrep);  
	  pars.put("plazas", plazas);
	  pars.put("f1", f1);
	  pars.put("f2", f2);
	}

	if("ventasconapartado".equalsIgnoreCase(reportname))
	{
		String pcondicion= "";
		if(request.getParameter("idalmacen")!=null)
			pcondicion = " and v.idalmacen=" + request.getParameter("idalmacen");
		if(request.getParameter("idpromotor")!=null)
			pcondicion = " and v.idpromotor=" + request.getParameter("idpromotor");
		if(request.getParameter("clave")!=null)
			pcondicion = " and d.cveparte='" + request.getParameter("clave")+ "'";
		if(request.getParameter("f1")!=null)
			pcondicion = pcondicion + " and v.fechacreacion between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
		pars.put("pcondicion", pcondicion);
	}
	  
	if("ventaspromotor".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "",pnombrerep="", pperiodo="";
	  if(request.getParameter("nombrerep")!=null)
	    pnombrerep = request.getParameter("nombrerep");
	  if(request.getParameter("periodo")!=null)
	    pperiodo = request.getParameter("periodo");
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " and f.idalmacen=" + request.getParameter("idalmacen");
	  if(request.getParameter("tipo")!=null)
		pcondicion = " and f.idtipopago=" + request.getParameter("tipo");
	  if(request.getParameter("f1")!=null)
	    pcondicion = pcondicion + " and f.fechafactura between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
          
	  pars.put("pperiodo", pperiodo);
	  pars.put("pnombrerep", pnombrerep);
	  pars.put("pcondicion", pcondicion);
	}

	if("reventascaidas".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "",pnombrerep="", pperiodo="";
	  if(request.getParameter("nombrerep")!=null)
	    pnombrerep = request.getParameter("nombrerep");
	  if(request.getParameter("periodo")!=null)
	    pperiodo = request.getParameter("periodo");
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where a.idalmacen=" + request.getParameter("idalmacen");
	  if(request.getParameter("f1")!=null)
	    pcondicion = pcondicion + " and a.fechacreacion between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
	  if(!"0".equalsIgnoreCase(request.getParameter("idpromotor")))
	    pcondicion = pcondicion + " and a.idvendedor="+request.getParameter("idpromotor");
	  if(!"0".equalsIgnoreCase(request.getParameter("idmotivo")))
	    pcondicion = pcondicion + " and a.idmotivo="+request.getParameter("idmotivo");
	  if(request.getParameter("cveparte")!=null)
	    pcondicion = pcondicion + " and a.cveparte='"+request.getParameter("cveparte")+"'";
            
	  pars.put("pperiodo", pperiodo);
	  pars.put("pnombrerep", pnombrerep);
	  pars.put("pcondicion", pcondicion);
	}

	if("rediarioventas".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "",pnombrerep="", pperiodo="";
	  if(request.getParameter("nombrerep")!=null)
	    pnombrerep = request.getParameter("nombrerep");
	  if(request.getParameter("periodo")!=null)
	    pperiodo = request.getParameter("periodo");
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " and f.idalmacen=" + request.getParameter("idalmacen");
	  if(request.getParameter("f1")!=null)
	    pcondicion = pcondicion + " and f.fechafactura between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
	  pars.put("pperiodo", pperiodo);
	  pars.put("pnombrerep", pnombrerep);
	  pars.put("pcondicion", pcondicion);
	}

	if("refcierremen".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
         String pfecha="";
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where t.idalmacen=" + request.getParameter("idalmacen");
        if(request.getParameter("fecha")!=null)
	    pfecha = request.getParameter("fecha");
        else
		pfecha = "curdate()";
	  pars.put("pcondicion", pcondicion);
         pars.put("pfecha ", pfecha);
	}
	
	if("existencialineas".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where pm.idalmacen=" + request.getParameter("idalmacen");
	  pars.put("pcondicion", pcondicion);
	}
	
	if("invcosteado".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " and pm.idalmacen=" + request.getParameter("idalmacen");
	  pars.put("pcondicion", pcondicion);
	}
	
	if("invporprecio".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " and pm.idalmacen=" + request.getParameter("idalmacen");
	  pars.put("pcondicion", pcondicion);
	  pars.put("precio", request.getParameter("precio"));
	}
	
	if("marbetes".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where pm.idalmacen=" + request.getParameter("idalmacen");
		if(request.getParameter("pasillo")!=null)
			pcondicion = pcondicion + " and pm.pasillo='" + request.getParameter("pasillo")+"' ";
		
	  pars.put("pcondicion", pcondicion);
	}
	
	if("movxlinea".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where k.idalmacen=" + request.getParameter("idalmacen") + " and k.fecha between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";	
	 
		pars.put("pcondicion", pcondicion);
		pars.put("periodo", per);	
	}
	
	if("repartesinventario".equalsIgnoreCase(reportname))
	{
	  String pcondicion= "";
	  String per = "De "+request.getParameter("mesLargo")+" "+request.getParameter("ano")+"";
	   
	  if(request.getParameter("idalmacen")!=null)
	    pcondicion = " where a.idalmacen=" + request.getParameter("idalmacen") + " and i.periodo = '"+
							request.getParameter("ano")+request.getParameter("mes")+"'";	
	 
		pars.put("pcondicion", pcondicion);
		pars.put("periodo", per);	
	}
	
	if( "repartesestatus".equalsIgnoreCase(reportname) )
	{
	String cad = "";
		
	if (request.getParameter("idalmacen")!=null)
		cad = cad + " where pm.idalmacen = "+request.getParameter("idalmacen");
		
	if (request.getParameter("idlinea")!=null)	
		if(!("TODOS".equalsIgnoreCase(request.getParameter("idlinea"))))
			cad = cad + " and p.idlinea = "+request.getParameter("idlinea");

	if (request.getParameter("idestatus")!=null)	
		if(!("0".equalsIgnoreCase(request.getParameter("idestatus"))))
			cad = cad + " and pm.idestatus = "+request.getParameter("idestatus");
			
	if (request.getParameter("inventario")!=null)
		if(!("0".equalsIgnoreCase(request.getParameter("inventario"))))
		cad = cad + " and pm."+request.getParameter("inventario")+" >  "+request.getParameter("mayor")+" ";		
		
		String per = "";
		pars.put("pcondicion", cad);
		pars.put("periodo", per);
		pars.put("meses", request.getParameter("meses"));
	}
	
	if( "requisicionessurtidas".equalsIgnoreCase(reportname) )
	{
	String cad = "";
	if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		
	if (request.getParameter("idalmacen")!=null)
	   if(!("0".equalsIgnoreCase(request.getParameter("idalmacen"))))
		cad = cad + " and a.idalmacen = "+request.getParameter("idalmacen");
				
	if (request.getParameter("tipo")!=null)	
		if(!("".equalsIgnoreCase(request.getParameter("tipo"))))
			cad = cad + " and r.tipo = '"+request.getParameter("tipo")+"' ";

	if (request.getParameter("destino")!=null)	
		if(!("".equalsIgnoreCase(request.getParameter("destino"))))
			cad = cad + " and r.destino = '"+request.getParameter("destino")+"' ";
		
	if(cad == null)
	   cad = "";
		pars.put("pcondicion", cad);	
	}

    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				SERVICIOS
	*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if("seorden".equalsIgnoreCase(reportname))
	{
	  String cad= "";	   
  
	  if(request.getParameter("idservicio")!=null)
	    cad = " where s.serie='" + request.getParameter("serie") + "' and s.idservicio='"+request.getParameter("idservicio")+"' ";		
      pars.put("pcondicion", cad);
	}  
	
	if("seprefactura".equalsIgnoreCase(reportname))
	{
	  String cad= "";	   
  
	  if(request.getParameter("idservicio")!=null)
	    cad = " where s.serie='" + request.getParameter("serie") + "' and s.idservicio='"+request.getParameter("idservicio")+"' ";		
      pars.put("pcondicion", cad);
	  pars.put("mostrarpartes", request.getParameter("mostrarpartes") );
	}  
	
	if("sepresupuestos".equalsIgnoreCase(reportname))
	{
	  String cad= "";	   
	   cad = " where d.serie='" + request.getParameter("serie") + "' and d.idpresupuesto='"+request.getParameter("idpresupuesto")+
		       "' and d.idrevision='"+request.getParameter("idrevision")+"' ";		
      pars.put("pcondicion", cad);
	  pars.put("exhibir", request.getParameter("exhibir") );
	}  
	
	if("seprestamos".equalsIgnoreCase(reportname))
	{
	  String cad= "";	   
	   cad = " where p.serie='" + request.getParameter("serie") + "' and p.idservicio='"+request.getParameter("idservicio")+"'  and p.estatus='P'";
	   
	   if(request.getParameter("fecha")!=null)
		  cad = cad + "' and p.fecha='"+request.getParameter("fecha")+"'";	
      pars.put("pcondicion", cad);
	}  
	
	if("seotroscargos".equalsIgnoreCase(reportname))
	{
	  String cad= "";	   
	   cad = " where o.serie='" + request.getParameter("serie") + "' and o.idservicio='"+request.getParameter("idservicio")+ "' ";		
      pars.put("pcondicion", cad);
	}   
	
	if("antiguedadordenes".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "Del "+request.getParameter("f1")+" al "+request.getParameter("f2");
	  
	  if("true".equalsIgnoreCase(request.getParameter("herramienta")))
	    cad = " inner join seprestamos pr on pr.serie=s.serie and pr.idservicio=s.idservicio where pr.estatus ='P'  ";	
	  else	
		  cad = " where s.idservicio > 0 ";
		  
	  cad = cad + " and s.fechacreacion between '"+ request.getParameter("f1")+"' and '"+ request.getParameter("f2")+"' ";	
	  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";	
		      
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";	
		
	  if(request.getParameter("idasesor")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idasesor")))
	    	cad = cad + " and s.idasesor=" + request.getParameter("idasesor") + " ";	
			
      if(request.getParameter("idestatus")!=null)
	  {
	    if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))
		{
	  	if("AB".equalsIgnoreCase(request.getParameter("idestatus")))
	    	cad = cad + " and s.idestatus between 1 and 7 ";	
		else
			if("CR".equalsIgnoreCase(request.getParameter("idestatus")))
	    		cad = cad + " and s.idestatus between 8 and 9 ";
			else	
				if("SF".equalsIgnoreCase(request.getParameter("idestatus")))
	    			cad = cad + " and s.idestatus < 9 ";
				else	
					cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
		}
	  }
	  			
	  if(request.getParameter("asignadas")!=null)
	  {
	  	if("1".equalsIgnoreCase(request.getParameter("asignadas")))
	    	cad = cad + " and ta.idusuario is not null ";		
			
		if("2".equalsIgnoreCase(request.getParameter("asignadas")))
	    	cad = cad + " and ta.idusuario is null ";			
	   }		  
	 
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	}  
	
	
	if("cerradosperiodo".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";	
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtipo=" + request.getParameter("idtipo") + " ";		
			
	  cad = cad + " and s.idestatus in(8,9) ";					   
	 
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("diarioventas".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";	
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtipo=" + request.getParameter("idtipo") + " ";				   
	 
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("ordenesxasesor".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and al.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";	
			   
	  if(request.getParameter("idasesor")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idasesor")))	  
		    cad = cad + " and s.idasesor=" + request.getParameter("idasesor") + " ";		
			
	  if(request.getParameter("idestatus")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))	  
		    cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
			
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";		 			   
	 
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("ordenesxcliente".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and al.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";	
			   
	  if(request.getParameter("idcliente")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idcliente")))	  
		    cad = cad + " and s.idcliente=" + request.getParameter("idcliente") + " ";		
			
	  if(request.getParameter("idestatus")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))	  
		    cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";			
			
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";		 			   
	 	   
	 
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("secomprastot".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  
	  cad = "where s.fechacreacion between '"+ request.getParameter("f1")+"' and '"+ request.getParameter("f2")+"' ";	
	  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";			      
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";	
			
      if(request.getParameter("idestatus")!=null)
	  {
	    if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))
		{
	  	if("AB".equalsIgnoreCase(request.getParameter("idestatus")))
	    	cad = cad + " and s.idestatus between 1 and 7 ";	
		else
			if("CR".equalsIgnoreCase(request.getParameter("idestatus")))
	    		cad = cad + " and s.idestatus between 8 and 9 ";
			else	
				if("SF".equalsIgnoreCase(request.getParameter("idestatus")))
	    			cad = cad + " and s.idestatus < 9 ";
				else	
					cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
		}
	  }		   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 

    if("sereshoras".equalsIgnoreCase(reportname) || "seactoper".equalsIgnoreCase(reportname) ||	 "seanalisisvtas".equalsIgnoreCase(reportname) || "seanalisisvtasres".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "Del "+request.getParameter("f1")+" al "+request.getParameter("f2");
	  		  
	  cad = cad + " where s.fechacreacion between '"+ request.getParameter("f1")+"' and '"+ request.getParameter("f2")+"' ";	
	  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";			      
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";	
		
	  if(request.getParameter("idtecnico")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idasesor")))
	    	cad = cad + " and  mo.idoperador=" + request.getParameter("idtecnico") + " ";	
			
      if(request.getParameter("idestatus")!=null)
	  {
	    if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))
		{
	  	if("AB".equalsIgnoreCase(request.getParameter("idestatus")))
	    	cad = cad + " and s.idestatus between 1 and 7 ";	
		else
			if("CR".equalsIgnoreCase(request.getParameter("idestatus")))
	    		cad = cad + " and s.idestatus between 8 and 9 ";
			else	
				if("SF".equalsIgnoreCase(request.getParameter("idestatus")))
	    			cad = cad + " and s.idestatus < 9 ";
				else	
					cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
		}
	  }
	  pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	 }

    if("tiempounidades".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";		
			
	  if(request.getParameter("idestatus")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))	  
		    cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";				   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("totalesXservicio".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";		
			  
	   cad = cad + " and s.idestatus in(8,9) ";				   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("seresumenvtas".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = "where s.fechacreacion between '"+
							request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";
							
	  if (request.getParameter("idplaza")!=null)
	     cad = cad + " and a.idplaza = "+request.getParameter("idplaza");
		  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";		
			  
	   if(request.getParameter("idestatus")!=null)
	  {
	    if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))
		{
	  	if("AB".equalsIgnoreCase(request.getParameter("idestatus")))
	    	cad = cad + " and s.idestatus between 1 and 7 ";	
		else
			if("CR".equalsIgnoreCase(request.getParameter("idestatus")))
	    		cad = cad + " and s.idestatus between 8 and 9 ";
			else	
				if("SF".equalsIgnoreCase(request.getParameter("idestatus")))
	    			cad = cad + " and s.idestatus < 9 ";
				else	
					cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
		}
	  }   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("sevinhist".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = " where s.vin='"+request.getParameter("vin")+"' and s.fechacreacion BETWEEN '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' ";		   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("seanalisisvin".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  cad = " where s.vin='"+request.getParameter("vin")+"' and s.fechacreacion BETWEEN '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' and s.refacturado = 0 ";		   	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("seunidcolg".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "De "+request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	   
	  
	  //cad = "where ac.vin = '"+ request.getParameter("vin") +"' and s.idestatus <> 10 ";
	  cad = "where s.idestatus <> 10 ";
	  
	  cad = cad + " and s.fechacreacion between '"+ request.getParameter("f1")+"' and '"+ request.getParameter("f2")+"' ";	
	  
	  if(request.getParameter("idalmacen")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idalmacen")))	  
	    cad = cad + " and s.idalmacen=" + request.getParameter("idalmacen") + " ";			      
			   
	  if(request.getParameter("idtipo")!=null)
	  	if(!"0".equalsIgnoreCase(request.getParameter("idtipo")))	  
		    cad = cad + " and s.idtiposervicio=" + request.getParameter("idtipo") + " ";	
			
      if(request.getParameter("idestatus")!=null)
	  {
	    if(!"0".equalsIgnoreCase(request.getParameter("idestatus")))
		{
	  	if("AB".equalsIgnoreCase(request.getParameter("idestatus")))
	    	cad = cad + " and s.idestatus between 1 and 7 ";	
		else
			if("CR".equalsIgnoreCase(request.getParameter("idestatus")))
	    		cad = cad + " and s.idestatus between 8 and 9 ";
			else	
				if("SF".equalsIgnoreCase(request.getParameter("idestatus")))
	    			cad = cad + " and s.idestatus < 9 ";
				else	
					cad = cad + " and s.idestatus=" + request.getParameter("idestatus") + " ";		
		}
	  }		   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("sevalescores".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per =" ";
	   
	  cad = "where v.serie= '"+ request.getParameter("serie")+"' and v.idservicio='"+request.getParameter("idservicio")+"' "+
	        "and v.fechacreacion=curdate() ";		   
	 	   
		pars.put("pcondicion", cad);
		pars.put("periodo", per);	
	} 
	
	if("sevalesrefacciones".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String cad2 =" ";
	   
	  cad = "where r.serie= '"+ request.getParameter("serie")+"' and r.idservicio='"+request.getParameter("idservicio")+"' and r.fecha=curdate() ";		   	 	   
	  cad2 = "where k.iddocto= '"+ request.getParameter("serie")+request.getParameter("idservicio")+"' and k.fecha=curdate() ";		
	  
	  pars.put("pcondicion", cad);
	  pars.put("pcondicion2", cad2);
	} 
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//				      CUENTAS X COBRAR
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if( "recibo".equalsIgnoreCase(reportname) )
	{
		String serie= "'"+request.getParameter("serie")+"'";
		pars.put("serie",serie);
	}  
	
	if("ccfacturas".equalsIgnoreCase(reportname) || "ccfacturasnc".equalsIgnoreCase(reportname) || "ccfacturasconsecutivo".equalsIgnoreCase(reportname) || "ccfacturasconsecutivonc".equalsIgnoreCase(reportname))
	{
		String cad= "";
	   
		if(request.getParameter("idalmacen")!=null)
			cad = " where f.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("f1")!=null)
			cad = cad + " and f.fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
          
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("ccfacturasdet".equalsIgnoreCase(reportname))
	{
		String cad= "";
	   
		if(request.getParameter("idalmacen")!=null)
			cad = " and f.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("f1")!=null)
			cad = cad + " and f.fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
          
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("ccfacturaspagadas".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	   
		if(request.getParameter("idalmacen")!=null)
			cad = " and f.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("f1")!=null)
			cad = cad + " and fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
      //out.println(cad);    
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	} 
	
	if("ccfacturaspagadasdet".equalsIgnoreCase(reportname))
	{
		String cad= "";
	   
		if(request.getParameter("idalmacen")!=null)
			cad = " and f.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("f1")!=null)
			cad = cad + " and f.fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
          
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}	
	
	if("ccfacturasNopagadas".equalsIgnoreCase(reportname))
	{
		String cad= "";
	   
		if(request.getParameter("idalmacen")!=null)
			cad = " and f.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("f1")!=null)
			cad = cad + " and f.fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
          
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("ccnotascargo".equalsIgnoreCase(reportname))
	{
		String cad= "";
	    if(request.getParameter("f1")!=null)
			cad = " where nc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
		if(request.getParameter("idalmacen")!=null)
			cad = cad + " and nc.idalmacen="+request.getParameter("idalmacen");
        if(request.getParameter("estatus")!=null)
			cad = cad + " and nc.idestatus="+request.getParameter("estatus");  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("ccnotascredito".equalsIgnoreCase(reportname))
	{
		String cad= ""; 
		if(request.getParameter("f1")!=null)
			cad = " where nc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
		if(request.getParameter("idalmacen")!=null)
			cad = cad + " and nc.idalmacen="+request.getParameter("idalmacen");
		if(request.getParameter("estatus")!=null)
			cad = cad + " and nc.idestatus="+request.getParameter("estatus");
  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("ccnotascreditosaldo".equalsIgnoreCase(reportname))
	{
		String cad= ""; 
		if(request.getParameter("f1")!=null)
			cad = " where nc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' and nce.activo=1 ";
		if(request.getParameter("idalmacen")!=null)
			cad = cad + " and nc.idalmacen="+request.getParameter("idalmacen");
			cad = cad + " and nc.saldo>0 "; 	  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}
	
	if("cccierrecaja".equalsIgnoreCase(reportname))
	{
	  String cad= "";
         String cad2 = "";
	  if(request.getParameter("idalmacen")!=null)
	    cad = " and pc.idalmacen="+request.getParameter("idalmacen");
	   
	  if(request.getParameter("f1")!=null)
	      cad = cad + " and pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
	  
	  if(request.getParameter("cancelados")!=null)
	      cad2 = cad2 + " and idtipo not in (2,4,6)";
	  
	  pars.put("pcondicion", cad);
         pars.put("pcondicion2", cad2);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}        
	
	if("ccanticipos".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  if(request.getParameter("idalmacen")!=null)
	  {
	    cad = "and pc.idalmacen="+request.getParameter("idalmacen");
	    if(request.getParameter("f1")!=null)
	      cad = cad + " and pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
	  }
	  else if(request.getParameter("f1")!=null)
	      cad = cad + " and pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
	  
	  if("F".equalsIgnoreCase(request.getParameter("docto")))
	      cad = cad + " and pc.movimiento=5";
	  else
		  cad = cad + " and pc.movimiento=11";
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}   
	
	if("ccrecibos".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  if(request.getParameter("idalmacen")!=null)
	  {
	    cad = "where a.idalmacen="+request.getParameter("idalmacen");
	    if(request.getParameter("f1")!=null)
	      cad = cad + " and a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
		if(request.getParameter("estatus")!=null)
			cad = cad + " and a.estatus="+request.getParameter("estatus");	
	  }
	  else 
		if(request.getParameter("f1")!=null)
		{
	       cad = cad + " where a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
		   if(request.getParameter("estatus")!=null)
				cad = cad + " and a.estatus="+request.getParameter("estatus");	
		}
	  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}       

	if("ccreciboscancelados".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  if(request.getParameter("idalmacen")!=null)
	    cad = " and a.idalmacen="+request.getParameter("idalmacen");
	  if(request.getParameter("f1")!=null)
	    cad = cad + " and a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
	  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}      
	
	if("ccanticiposnoligados".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  if(request.getParameter("idalmacen")!=null)
	    cad = " and a.idalmacen="+request.getParameter("idalmacen");
	  if(request.getParameter("f1")!=null)
	    cad = cad + " and a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
	  
	  pars.put("pcondicion", cad);
	  pars.put("pnombrerep", request.getParameter("pnombrerep"));	
	  pars.put("pperiodo", request.getParameter("pperiodo"));	
	}   
	
	if("ccestadocuenta".equalsIgnoreCase(reportname))
	{
	  pars.put("pcliente", request.getParameter("idcliente"));
	}    
	
	if("cctarjetacliente".equalsIgnoreCase(reportname))
	{ 
	  pars.put("pcliente", request.getParameter("idcliente"));
	  pars.put("pfecha1", request.getParameter("fecha1"));
	  pars.put("pcondicion", "");
	}     
	
	if("ccantiguedadsaldos".equalsIgnoreCase(reportname))
	{
	  pars.put("pcliente", request.getParameter("idcliente"));
	  pars.put("pfecha", "'"+request.getParameter("fecha1")+"'");
	  pars.put("pcondicion", request.getParameter("condicion"));
	}

	if("ccantiguedadsaldosdet".equalsIgnoreCase(reportname))
	{
	  pars.put("pcliente", request.getParameter("idcliente"));
	  pars.put("pfecha", "'"+request.getParameter("fecha1")+"'");
	  pars.put("pcondicion", request.getParameter("condicion"));
	}
       
       if("ccmovimientos".equalsIgnoreCase(reportname))
	{
	  String cad= "";
	  String per = "";
	  if(request.getParameter("f1")!=null)
	      cad = cad + " where pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'"; 
		  
	  if(request.getParameter("idalmacen")!=null)
	    cad = cad + " and pc.idalmacen="+request.getParameter("idalmacen");
	  
	  if(request.getParameter("idmovimiento")!=null)
	    if("T".equalsIgnoreCase(request.getParameter("idmovimiento")))
	       cad = cad + "";
		else
		   cad = cad + " and pc.movimiento="+request.getParameter("idmovimiento");
	  
	  per = "De "+ request.getParameter("f1")+"' a '"+request.getParameter("f2")+"";
	  pars.put("pcondicion", cad);
	  pars.put("pperiodo", per);	
	} 

       if("movimientos".equalsIgnoreCase(reportname)) /*Oscar*/
	{
	  String cad  = "";
	  String cad1 = "";
	  String cad2 = "";
	  String cad3 = "";
	  String cad4 = "";
	  String cad5 = "";
	  String cad6 = "";
	  String cad7 = "";
	  String per = "";
	  if(request.getParameter("f1")!=null)
	  {
	      cad1 = cad1 + " where f.fechafactura between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad2 = cad2 + " where nc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad3 = cad3 + " where nc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad4 = cad4 + " where pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad5 = cad5 + " and a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad6 = cad6 + " and a.fecha between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
		  cad7 = cad7 + " where pc.fechacreacion between '"+ request.getParameter("f1")+"' and '"+request.getParameter("f2")+"' "; 
	  } 
		  
	  if(request.getParameter("idalmacen")!=null)
         {
	    if("0".equalsIgnoreCase(request.getParameter("idalmacen")))
		{
              cad = "";
              }
           else
              { 
	    	cad1 = cad1 + " and f.idalmacen="+request.getParameter("idalmacen");
			cad2 = cad2 + " and nc.idalmacen="+request.getParameter("idalmacen");
			cad3 = cad3 + " and nc.idalmacen="+request.getParameter("idalmacen");
			cad4 = cad4 + " and pc.idalmacen="+request.getParameter("idalmacen");
			cad5 = cad5 + " and a.idalmacen="+request.getParameter("idalmacen");
			cad6 = cad6 + " and a.idalmacen="+request.getParameter("idalmacen");
			cad7 = cad7 + " and pc.idalmacen="+request.getParameter("idalmacen");
		}
         }
	  
	  if(request.getParameter("idmovimiento")!=null)
	    if("0".equalsIgnoreCase(request.getParameter("idmovimiento")))
	       cad = cad + "";
		else
		   cad = cad + " having tiporeporte="+request.getParameter("idmovimiento");
	  
	  per = "De "+ request.getParameter("f1")+" a "+request.getParameter("f2")+"";
	  pars.put("having", cad);
	  pars.put("condicion1", cad1);
	  pars.put("condicion2", cad2);
	  pars.put("condicion3", cad3);
	  pars.put("condicion4", cad4);
	  pars.put("condicion5", cad5);
	  pars.put("condicion6", cad6);
	  pars.put("condicion7", cad7);
	  pars.put("periodo", per);	
	  pars.put("pnombrerep", "Movimientos Capturados");	
	}     
   
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	ServletContext context = session.getServletContext();
	String relativepath = context.getRealPath(request.getContextPath());
	pars.put("relativepath", relativepath+ "/" + mod);
		
	JasperPrint jasperPrint =JasperFillManager.fillReport(jasperReport, pars, connection);
		
	StringBuffer sbuffer = new StringBuffer();

	OutputStream ouputStream = response.getOutputStream();

	String reporttype = request.getParameter("tiporeporte");

	JRExporter exporter = null;
	
	if( "pdf".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/pdf");
		exporter = new JRPdfExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "rtf".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/rtf");
		response.setHeader("Content-Disposition", "inline; filename=\"file.rtf\"");

		exporter = new JRRtfExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "html".equalsIgnoreCase(reporttype) )
	{
		exporter = new JRHtmlExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "xls".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/xls");
		response.setHeader("Content-Disposition", "inline; filename=\"file.xls\"");

		exporter = new JRXlsExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "csv".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/csv");
		response.setHeader("Content-Disposition", "inline; filename=\"file.csv\"");

		exporter = new JRCsvExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	
	exporter.exportReport(); 

}catch(Exception ex) {
         ex.printStackTrace();
      }
%>