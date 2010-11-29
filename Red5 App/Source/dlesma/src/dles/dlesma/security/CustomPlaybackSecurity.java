package dles.dlesma.security;

import org.red5.server.api.IScope;
import org.red5.server.api.stream.IStreamPlaybackSecurity;


public class CustomPlaybackSecurity implements IStreamPlaybackSecurity
{
    String[] acls = new String[0]; 
	
	public void setACL(String[] aclList)
	{
		this.acls = aclList;
	}
	
	public boolean isAvailableACL(String acl)
	{
		for (int i = 0; i < acls.length; i++) 
		{
			if(acls[i].equals(acl))
			{
				return true;
			}
		}
		return false;
	}
	
	
	@Override
	public boolean isPlaybackAllowed(IScope scope, String name, int start,
		    int length, boolean flushPlaylist) 
	{
		return isAvailableACL(name);
	}
}


