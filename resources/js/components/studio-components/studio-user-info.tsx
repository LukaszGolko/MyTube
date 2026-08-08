import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { useInitials } from '@/hooks/use-initials';
import { dashboard } from '@/routes/home';

import { type User } from '@/types';


export function StudioUserInfo({
    user,
    showEmail = false,
}: {
    user: User;
    showEmail?: boolean;
}) {
    const getInitials = useInitials();

    return (
        <div className="flex flex-col items-center gap-2 py-2">
            <a href={dashboard().url} target="_blank" className="block">
                <Avatar
                    className="h-32 w-32 overflow-hidden rounded-full transition-all duration-200 ease-linear group-data-[collapsible=icon]:h-8 group-data-[collapsible=icon]:w-8"
                >
                    <AvatarImage src={user.avatar} alt={user.name} />
                    <AvatarFallback className="rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                        {getInitials(user.name)}
                    </AvatarFallback>
                </Avatar>
            </a>
            <div className="grid flex-1 text-center text-sm leading-tight group-data-[collapsible=icon]:hidden">
                <p className="truncate font-medium">Twój kanał</p>
                <span className="truncate font-medium">{user.name}</span>
                {showEmail && (
                    <span className="truncate text-xs text-muted-foreground">
                        {user.email}
                    </span>
                )}
            </div>
        </div>
    );
}
