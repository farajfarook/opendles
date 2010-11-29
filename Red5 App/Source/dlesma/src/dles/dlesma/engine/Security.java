package dles.dlesma.engine;

import dles.dlesma.Application;
import dles.dlesma.engine.database.DBHandle;
import dles.dlesma.security.CustomPlaybackSecurity;
import dles.dlesma.security.CustomPublishSecurity;
import dles.dlesma.security.CustomSharedObjectSecurity;

public class Security 
{
	Application app;
	CustomPlaybackSecurity playbackSecurity = new CustomPlaybackSecurity();
	CustomPublishSecurity publishSecurity = new CustomPublishSecurity();
	CustomSharedObjectSecurity sharedObjectSecurity = new CustomSharedObjectSecurity();
	
	public Security(Application app) {
		// TODO Auto-generated constructor stub
		this.app = app;
	}
	
	private void reLoad()
	{
	//	app.registerSharedObjectSecurity(sharedObjectSecurity);
	//	app.registerStreamPlaybackSecurity(playbackSecurity);
	//	app.registerStreamPublishSecurity(publishSecurity);
	}
	
	public void refresh()
	{
		//get access control from database for current user
		//get publish rules and apply to publish
		String[] pubAcls = DBHandle.getPublishACL(app.CurrentUserID);
		publishSecurity.setACL(pubAcls);
		//get play back rules and apply to play back
		String[] playAcls = DBHandle.getPlayACL(app.CurrentUserID);
		playbackSecurity.setACL(playAcls);
		//get shared object rules and apply to shared objects
		String[] soAcls = DBHandle.getSharedObjectACL(app.CurrentUserID);
		sharedObjectSecurity.setACL(soAcls);
		//Load the security
		reLoad();
	}
	
	public String getCam(int remoteUserID) 
	{
		refresh();
		String acl = Constant.CAM_LIVE_PRE + remoteUserID;
		//if(playbackSecurity.isAvailableACL(acl))
			return acl;
		//else
		//	return Constant.UNAUTHERIZD_ACCESS_VID;
	}

	public String putCam() 
	{
		refresh();
		String acl = Constant.CAM_LIVE_PRE + app.CurrentUserID;
	//	if(publishSecurity.isAvailableACL(acl))
			return acl;
	//	else
	//		return Constant.NULL_VIDEO;
	}
	
	public String getScr(int classID)
	{
		refresh();
		String acl = Constant.SCR_PRE + classID;
	//	if(playbackSecurity.isAvailableACL(acl))
			return acl;
	//	else
	//		return Constant.UNAUTHERIZD_ACCESS_VID;
	}
	
	public String putScr(int classID)
	{
		refresh();
		String acl = Constant.SCR_PRE + classID;
	//	if(publishSecurity.isAvailableACL(acl))
			return acl;
	//	else
	//		return Constant.NULL_VIDEO;
	}
	
	public String getSOChat(int userID,int remoteUserID)
	{
		int id1,id2;
		id1 = (userID>remoteUserID)?userID:remoteUserID;
		id2 = (userID>remoteUserID)?remoteUserID:userID;
		String acl = Constant.CHAT_SO_PRE + id1 +"-"+  id2;
	//	if(sharedObjectSecurity.isAvailableACL(acl))
			return acl;
	//	else
	//		return Constant.NULL_SO;
	}

	public String getWBSO(int classID) {
		refresh();
		String acl = Constant.WB_PRE + classID;
	//	if(sharedObjectSecurity.isAvailableACL(acl))
			return acl;
	//	else
	//		return Constant.NULL_SO;
	}
}
