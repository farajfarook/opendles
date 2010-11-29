package dles.dlesma;

import org.red5.server.adapter.ApplicationAdapter;
import org.red5.server.api.IConnection;
import org.red5.server.api.IScope;
//import org.apache.commons.logging.Log;
//import org.apache.commons.logging.LogFactory;

import dles.dlesma.engine.Authenticator;
import dles.dlesma.engine.Security;
import dles.dlesma.engine.database.DBConnection;
import dles.dlesma.engine.database.DBHandle;


public class Application extends ApplicationAdapter
{
//	private static final Log log = LogFactory.getLog( Application.class );
	
	public int CurrentUserID;
	private Security security;
	
	@Override
	public boolean appStart(IScope arg0) {
		// TODO Auto-generated method stub
		security = new Security(this);
//		log.info( "Red5First.appStart" );
		return super.appStart(arg0);
	}
	
	@Override
	public void appStop(IScope arg0) {
		// TODO Auto-generated method stub
//		log.info( "Red5First.appStop" );
		super.appStop(arg0);
	}
	
	@Override
	public boolean appConnect(IConnection conn, Object[] arg1) {
		// TODO Auto-generated method stub
		DBConnection.Init();
		if(!DBConnection.Connect())
			return false;
//		log.info( "Red5First.appConnect " + conn.getClient().getId() );
		if(arg1.length == 2)
		{
			CurrentUserID = Integer.parseInt(arg1[0].toString());
			if(Authenticator.UserAuthenticate(CurrentUserID,(String)arg1[1]))
			{
				return super.appConnect(conn, arg1);
			}
		}
		conn.close();
		return false;
	}

	@Override
	public void appDisconnect(IConnection conn) {
		// TODO Auto-generated method stub
//		log.info( "Red5First.appDisconnect " + conn.getClient().getId() );
		super.appDisconnect(conn);
		DBConnection.Disconnect();
	}
	
	public String getCam(int remoteUserID)
	{
		return security.getCam(remoteUserID);
	}
	
	public String putCam()
	{
		return security.putCam();
	}
	
	public String getScr(int classID)
	{
		return security.getScr(classID);
	}
	
	public String putScr(int classID)
	{
		return security.putScr(classID);
	}
	
	public String refresh()
	{
		security.refresh();
		return "done";
	}
	
	public String getUsername(int userID)
	{
		return DBHandle.getUsername(userID);
	}
	
	public String getSOChat(int userID,int remoteUserID)
	{
		return security.getSOChat(userID,remoteUserID);
	}
	
	public String getWBSO(int classID)
	{
		return security.getWBSO(classID);
	}
	
}
